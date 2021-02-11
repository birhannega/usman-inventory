<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Carbon\Carbon;


/**
 * Class ExpenseController
 * @package App\Http\Controllers
 */
class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::Where('deleted',0)->orderby('created_at','desc')->paginate();
        $today_expenses= Expense::where('deleted',0)->whereDate('created_at', '=', Carbon::today())->sum('exp_amount');
        $weekly_expenses=  Expense::where('deleted',0)->whereBetween('created_at',[today()->subDays(7)->format('Y-m-d'),today()->addDays(1)->format('Y-m-d')])->sum('exp_amount');
        $monthly_expenses=  Expense::where('deleted',0)->whereBetween('created_at',[today()->subDays(30)->format('Y-m-d'),today()->addDays(1)->format('Y-m-d')])->sum('exp_amount');

         return view('expense.index', compact('expenses','today_expenses','weekly_expenses','curentDate','monthly_expenses'))
            ->with('i', (request()->input('page', 1) - 1) * $expenses->perPage());
    }

    public function filter(Request $request)
    {
        $expenses = Expense::Where('deleted',0)->orderby('created_at','desc')->paginate();
        $today_expenses= Expense::where('deleted',0)->whereDate('created_at', '=', Carbon::today())->sum('exp_amount');
        $weekly_expenses=  Expense::where('deleted',0)->whereBetween('created_at',[today()->subDays(7)->format('Y-m-d'),today()->format('Y-m-d')])->sum('exp_amount');
        $monthly_expenses=  Expense::where('deleted',0)->whereBetween('created_at',[today()->subDays(30)->format('Y-m-d'),today()->addDays(1)->format('Y-m-d')])->sum('exp_amount');


   if($request->expdate!=null){
      // return $request->expdate;
   // $today_expenses= Expense::where('deleted',0)->whereDate('created_at', '=', Carbon::today())->sum('exp_amount');

   }

   if($request->filled('expdate')) {
    dd('user_id is not empty.');
} else {
    $expenses = Expense::Where('deleted',0)->whereDate('created_at', '=', Carbon::parse($request->expdate)->format('Y-m-d'))->paginate();
}


 
        return view('expense.index', compact('expenses','today_expenses','monthly_expenses','weekly_expenses'))
            ->with('i', (request()->input('page', 1) - 1) * $expenses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expense = new Expense();
        return view('expense.create', compact('expense'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Expense::$rules);

        $expense = Expense::create($request->all());

        return redirect()->route('expenses.index')
            ->with('success', 'Expense created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = Expense::where('exp_id','=',$id)->first();

        return view('expense.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::where('exp_id','=',$id)->first();
        return view('expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(Expense::$rules);

        $expense->update($request->all());

        return redirect()->route('expenses.index')
            ->with('success', 'Expense updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $expense = Expense::where('exp_id','=',$id)->delete();

        return redirect()->route('expenses.index')
            ->with('success', 'Expense deleted successfully');
    }
}

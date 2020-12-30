<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Credit;
use App\Models\Item;
use Illuminate\Http\Request;

/**
 * Class CreditController
 * @package App\Http\Controllers
 */
class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credits = Credit::orderBy('created_at','desc')->paginate();

        return view('credit.index', compact('credits'))
            ->with('i', (request()->input('page', 1) - 1) * $credits->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $credit = new Credit();
        $items=Item::all();
        return view('credit.create', compact('credit','items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credit= new credit();
        request()->validate(Credit::$rules);
        $data= $request->all();
        $credit->amount=$request->amount;
        $credit->unitPrice=$request->unitPrice;
        $credit->totalprice= $request->unitPrice*$request->amount;
        $credit->returned=false;
        $credit->deleted=false;
        $credit->item_code= $request->item_code;
        $credit->creditFor= $request->creditFor;
        $credit->created_user_id= Auth::user()->id;
       $credit_id = $credit->save();
       $old_item= Item::where('Item_code',"=", $request->item_code)->first();
       Item::where('Item_code', $request->item_code)->update(
        ['amount'=> $old_item->amount- $credit->amount]
    );
         return redirect()->route('credits.index')
           ->with('success', 'Credit created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$credit = Credit::find($id);
        $credit=Credit::where('credit_id',"=", $id)->first();

        return view('credit.show', compact('credit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $credit = Credit::find($id);

        return view('credit.edit', compact('credit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Credit $credit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit $credit)
    {
        request()->validate(Credit::$rules);

        $credit->update($request->all());

        return redirect()->route('credits.index')
            ->with('success', 'Credit updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $credit = Credit::find($id)->delete();

        return redirect()->route('credits.index')
            ->with('success', 'Credit deleted successfully');
    }
}

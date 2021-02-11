<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Client;
use App\Models\creditedItem;


use Auth;


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
        $credits = Credit::join('clients', 'clients.id', '=', 'creditFor')->paginate();

        return view('credit.index', compact('credits'))
            ->with('i', (request()->input('page', 1) - 1) * $credits->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=false)
    {
        $credit = new Credit();
        $items= Item::all();
        $clients=Client::all();
        $selected='';
        $new_credit=null;

        $last=Credit::where('credit_id',"=", $id)->first();
        if($last){
            $new_credit=$last;
            $selected=$last->creditFor;
        }
        $client = Client::find($selected);
        $creditedItem =new creditedItem();

     return view('credit.create', compact('credit','items','id','new_credit','creditedItem','clients','selected','client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Credit::$rules);
        $credit = new Credit();
        $credit->creditFor=$request->creditFor;
        $credit->returned=0;
        $credit->created_user_id=Auth::User()->id;
        $credit->created_at=now();
        $credit->save();
        $id=$credit->id;

        $items= Item::all();
        $new_credit=Credit::Where('credit_id','=',$id)->get();

        return redirect()->route('credits.complete', $id)->with(array(
            [
                'id'=>$id,
                'new_credit'=>$new_credit,
               'success'=>'credit registered. please add items',
             'items'=>$items,
             ]));

        // return redirect()->back()
        //     ->with('success', 'Credit created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $credit = Credit::where('credit_id','=',$id)->first();

        return view('credit.show', compact('credit'));
    }

    public function return($id)
    {
        
        $credit = Credit::where('credit_id','=',$id)->first();

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
        $credit = Credit::Where('credit_id','=',$id)->first();

        return view('credit.edit', compact('credit','id'));
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

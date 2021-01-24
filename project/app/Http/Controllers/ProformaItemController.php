<?php

namespace App\Http\Controllers;

use App\Models\ProformaItem;
use App\Models\Item;

use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Rule;
use Validator;
use auth;
use Redirect;
/**
 * Class ProformaItemController
 * @package App\Http\Controllers
 */
class ProformaItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proformaItems = ProformaItem::paginate();

        return view('proforma-item.index', compact('proformaItems'))
            ->with('i', (request()->input('page', 1) - 1) * $proformaItems->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proformaItem = new ProformaItem();
        return view('proforma-item.create', compact('proformaItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
        request()->validate(ProformaItem::$rules);

        $code=$request->Item_code;
        $pid=$request->p_id;
       

        $checkItem= ProformaItem::where('p_id',$pid)->where('Item_code',$code)->count();
        if($checkItem>=1){
            return Redirect::back()
            ->withErrors(['Item is already added in the Proforma.']);
        }

        $item= new  ProformaItem();
        $item->Item_code= $request->Item_code;
        $item->unit_price= $request->unit_price;
        $item->p_id= $request->p_id;
        $item->total_price= $request->unit_price*$request->amount;
        $item->amount= $request->amount;
        $item->createdby= Auth::user()->id;
        $item->save();
              
          return redirect()->back()
            ->with('success', 'ProformaItem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proformaItem = ProformaItem::find($id);

        return view('proforma-item.show', compact('proformaItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proformaItem = ProformaItem::find($id);
        $items= Item::where('amount','>',1)->get();
        return view('proforma-item.edit', compact('proformaItem','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProformaItem $proformaItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //return $request;
        request()->validate(ProformaItem::$rules);

        ProformaItem::where('id','=',$id)->update(
            [
                'amount'=>$request->amount,
                'unit_price'=>$request->unit_price,
                'total_price'=>$request->unit_price*$request->amount
            ]
        );

        return redirect()->route('proformas.complete',$request->p_id)
            ->with('success', 'ProformaItem updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proformaItem = ProformaItem::find($id)->delete();

        return redirect()->back()
            ->with('success', 'ProformaItem deleted successfully');
    }
}

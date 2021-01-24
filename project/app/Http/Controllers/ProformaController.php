<?php

namespace App\Http\Controllers;

use App\Models\Proforma;
use App\Models\ProformaItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Auth;

/**
 * Class ProformaController
 * @package App\Http\Controllers
 */
class ProformaController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proformas = Proforma::paginate();

        return view('proforma.index', compact('proformas'))
            ->with('i', (request()->input('page', 1) - 1) * $proformas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=false)
    {
        $proforma = new Proforma();
        $items= Item::where('amount','>',1)->get();
        $selected = Item::where('amount','>',1)->first()->Item_code;
        $grandtotal = ProformaItem::where('p_id','=',$id)->sum('total_price');

        $proformaItems = ProformaItem::where('p_id','=',$id)
        ->select(
            'proforma_items.id',
            'proforma_items.amount',
            'proforma_items.Item_code',
            'items.ItemName',
            'items.unit',
            'unit_price',
            'total_price',
            'createdby',
            'proforma_items.created_at',
            'p_id'
        )
        ->join('items', 'items.Item_code', '=', 'proforma_items.Item_code')
        ->paginate();


        $proforma_drafted=Proforma::where('p_id',"=", $id)->first();
        return view('proforma.create', compact('proforma','proforma_drafted','items','selected','proformaItems','grandtotal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // request()->validate(Proforma::$rules);
     //  return $request;
        $proforma= new Proforma();
        $proforma->p_to=$request->p_to;
        $proforma->ref_number=$request->ref_number;
        $proforma->p_valid_for=$request->p_valid_for;
        $proforma->p_delivery_date=$request->p_delivery_date;
        $proforma->p_to=$request->p_to;
        $proforma->created_at= now();
        $proforma->save();
        $id= $proforma->id;
        $items= Item::all();
        $selected = Item::first()->Item_code;
         return redirect()->route('proformas.complete', $id)->with(array(
             [
                 'id'=>$id,
                'success'=>'Sale created',
              'items'=>$items]));
     


        //  return redirect()->route('proformas.index')
        //      ->with('success', 'Proforma created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proforma=Proforma::where('p_id',"=", $id)->first();

        return view('proforma.show', compact('proforma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proforma=Proforma::where('p_id',"=", $id)->first();

        return view('proforma.edit', compact('proforma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proforma $proforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proforma $proforma)
    {
        request()->validate(Proforma::$rules);

        $proforma->update($request->all());

        return redirect()->route('proformas.index')
            ->with('success', 'Proforma updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proforma=Proforma::where('p_id',"=", $id)->delete();

        return redirect()->route('proformas.index')
            ->with('success', 'Proforma deleted successfully');
    }
     public function finish( $id)
    {
        $grandtotal = ProformaItem::where('p_id','=',$id)->sum('total_price');

        Proforma::where('p_id',"=", $id)->update([
            'completed'=>1,
            'p_grand_total'=> $grandtotal+0.15*$grandtotal,
            'p_before_vat'=>$grandtotal,
            'p_created_user_id'=>Auth::User()->id,
            'p_total'=>$grandtotal

        ]);

        return redirect()->back()
            ->with('success', 'Proforma updated successfully');
    }
}

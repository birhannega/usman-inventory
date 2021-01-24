<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Item;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


/**
 * Class SaleController
 * @package App\Http\Controllers
 */
class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = DB::table('sales')->orderby('created_at','desc')
        ->select(
        'sales.created_at',
        'calculated_vat',
        'with_vat',
        'before_vat',
        'sales.id',
        'buyer_name',
        'total_paid',
        'sales.updated_at',
        'users.name')
            ->join('users', 'sales.created_by', '=', 'users.id')
        ->Paginate(5);

        return view('sale.index', compact('sales'))
            ->with('i', (request()->input('page', 1) - 1) * $sales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=false)
    {
        $started_sale=null;   
        if($id){
            $started_sale= DB::table('sales')->where('id','=',$id)->get();
        }
        $sale = new Sale();
        $items= Item::all();
         $selected = Item::first()->Item_code;
         $soldProducts= DB::table('sold_products')->where('sale_id','=',$id)->get();
         $subtotal= DB::table('sold_products')->where('sale_id','=',$id)->sum('total_amount');

        return view('sale.create', compact('sale','selected','items','started_sale','soldProducts','subtotal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Sale::$rules);

        $sale= new sale();
        $sale->buyer_name=$request->buyer_name;
        $sale->created_by =Auth::user()->id;
        $sale->remark=$request->remark;
        $sale->buyer_trade_name=$request->buyer_trade_name;
        $sale->buyer_vat_no=$request->buyer_vat_no;
        $sale->buyer_subcity=$request->buyer_subcity;
        $sale->buyer_worda=$request->buyer_worda;
        $sale->buyer_kebele=$request->buyer_kebele;
        $sale->buyer_house_no=$request->buyer_house_no;


        $sale->save();
        $id= $sale->id;
        $items= Item::where('amount','>',1)->get();
        $selected = Item::first()->Item_code;
        return redirect()->route('sales.complete',$id)->with(array(
            ['id'=>$id,
            'sale'=>$sale,
            'success'=>'Sale created',
             'items'=>$items]));
     }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id);
       //echo json_encode($sale);
       $soldProducts= DB::table('sold_products')
       ->join('Items', 'sold_products.product_id', '=', 'Items.Item_code')
       ->select('id','sale_id','qty','price','total_amount','ItemName','product_id','unit')
       ->where('sale_id','=',$id)->get();
       $subtotal= DB::table('sold_products')->where('sale_id','=',$id)->sum('total_amount');
       return view('sale.show', compact('sale','soldProducts','subtotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::find($id);

        return view('sale.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sale $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $subtotal= DB::table('sold_products')->where('sale_id','=',$id)->sum('total_amount');
       $includevat=$request->include_vat=='on'?1:0;
       Sale::where('id','=',$id)->update([
           'completed'=>true,
           'with_vat'=> $includevat,
           'before_vat'=>$subtotal,
           'after_vat'=>$includevat==1?(0.15*$subtotal)+$subtotal:$subtotal,
           'total_paid'=>$subtotal,
           'calculated_vat'=> $includevat==1?0.15*$subtotal:0
       ]);
    

        return redirect()->route('sales.index')
            ->with('success', 'Sale updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sale = Sale::find($id)->delete();

        return redirect()->route('sales.index')
            ->with('success', 'Sale deleted successfully');
    }
}

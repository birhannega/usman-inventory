<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Credit;
use App\Models\Item;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class CreditController
 * @package App\Http\Controllers
 */
class CreditController extends Controller
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
        $credits = Db::table('Credits')
        ->select('clients.name as creditFor',
        'Credits.created_at',
        'Credits.amount',
        'Credits.unitPrice',
        'Credits.totalprice',
        'credit_id',
        'items.ItemName as item_code')
        ->join('clients', 'clients.id', '=', 'Credits.creditFor')
        ->join('items', 'items.Item_code', '=', 'Credits.item_code')
        -> orderBy('Credits.created_at','desc')
        ->where('Credits.deleted',0)->paginate();
        $items=Item::all();

        return view('credit.index', compact('credits','items'))
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
        $clients=Client::all();


        return view('credit.create', compact('credit','items','clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  return $request;
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
        $credit=Credit::where('credit_id',"=", $id)
        ->join('clients', 'clients.id', '=', 'Credits.creditFor')
        ->join('items', 'items.Item_code', '=', 'Credits.item_code')
       ->select(
           'credit_id',
           'credits.amount',
           'credits.item_code',
           'clients.name',
           'clients.trade_name',
           'ItemName',
           'credits.unitPrice',
           'credits.totalprice',
           'returned',
           'credits.created_at',
           'credits.created_user_id'

       )
        ->first();
        //return $credit;

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
       // $credit = Credit::find($id);
       $items=Item::all();
        $credit=Credit::where('credit_id',"=", $id)->first();
        return view('credit.edit', compact('credit','items'));
    }

    public function search(Request $request){
           /// return $request;
            $endDate= $request->endDate;
            $start= $request->startDate;
            $item= $request->item_code;
            $client=$request->client;
            $credits = DB::table('credits')->orderby('created_at','desc')
            ->where('item_code',"=", $item)
            ->where('deleted',0)
        //    ->wherNotNull('created_at',">=", $start)
        //    ->wherNotNull('created_at',"<=", $endDate)
            ->Paginate();
            $items=Item::all();

            return view('credit.index', compact('credits','items'))
                ->with('i', (request()->input('page', 1) - 1) * $credits->perPage());



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
        $credit = Credit::where('credit_id','=',$id)->update([
            'deleted'=>1,
            'deleted_at'=>now()
        ]);

        return redirect()->route('credits.index')
            ->with('success', 'Credit deleted successfully');
    }
}

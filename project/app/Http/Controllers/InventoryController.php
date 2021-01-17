<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\PriceChange;
use Auth;
use carbon\carbon;

/**
 * Class InventoryController
 * @package App\Http\Controllers
 */
class InventoryController extends Controller
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
        $items= Item::all();
        $selected = Item::first()->Item_code;
        $inventories = Inventory::orderBy('inventories.created_at','desc')->paginate();

        return view('pages.inventory.index', compact('inventories','selected','items'))
            ->with('i', (request()->input('page', 1) - 1) * $inventories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventory = new Inventory();
        $items= Item::all();
       // $items = Item::pluck('ItemName', 'Item_code');
        $selected = Item::first()->Item_code;

        return view('pages.inventory.create', compact('inventory','items','selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inventory::$rules);

       // save inventory data
        $inv= new Inventory();
        $inv->ItemCode= $request->ItemCode;
        $inv->Quantity=$request->Quantity;
        $inv->UnitPrice=$request->UnitPrice;
        $inv->TotalPrice=$request->Quantity*$request->UnitPrice;
        $inv->sale_price=$request->sale_price;
        $inv->CreatedUserId=Auth::user()->id;
        $inv->created_at=carbon::now()->toDateTimeString();
        $inv->save();
      // inventory record end
      $old_item= Item::where('Item_code', $request->ItemCode)->first();

      //start recording price changes
      $change= new PriceChange();
      $change->oldPrice= $old_item->current_price;
      $change->newPrice= $request->sale_price;
      $change->created_at=carbon::now()->toDateTimeString();
      $change->Item_code=$request->ItemCode;
      $change->created_by=Auth::user()->id;
      $change->Save();
      //end recording price changes


//update current stock and current sale price of an item      

         Item::where('Item_code', $request->ItemCode)->update(
             [
                 'amount'=> $old_item->amount+$inv->Quantity,
                 'current_price'=> $request->sale_price
             ]

         );
         //end updating current stock and current sale price of an item      

       // $old_item->amount= $old_item->amount- $request->Quantity;

         return redirect()->route('inventories.index')
             ->with('success', 'Inventory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //   $inventory = Inventory::find($id);
        $inventory=Inventory::where('InventoryId',"=", $id)->first();
        return view('pages.inventory.show', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory=Inventory::where('InventoryId',"=", $id)->first();

        return view('pages.inventory.edit', compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inventory $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        request()->validate(Inventory::$rules);

        $inventory->update($request->all());

        return redirect()->route('inventories.index')
            ->with('success', 'Inventory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
      ///  $inventory = Inventory::find($id)->delete();
        $inventory=Inventory::where('InventoryId',"=", $id)->delete();


        return redirect()->route('inventories.index')
            ->with('success', 'Inventory deleted successfully');
    }

    function search(Request $request){
       // return $request;
        $inventories=Inventory::where('ItemCode',"=", $request->item_code)->orderBy('inventories.created_at','desc')->paginate();;
        $selected=Inventory::where('ItemCode',"=", $request->item_code)->first();
        $items= Item::all();

        return view('pages.inventory.index', compact('inventories','selected','items'))
            ->with('i', (request()->input('page', 1) - 1) * $inventories->perPage());    }
}

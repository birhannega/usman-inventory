<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Item;
use Auth;

/**
 * Class InventoryController
 * @package App\Http\Controllers
 */
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventories = Inventory::orderBy('inventories.created_at','desc')
        ->join('items', 'inventories.ItemCode', '=', 'items.Item_code')
        ->paginate();

        // DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.id', 'contacts.phone', 'orders.price')
        //     ->get();

        return view('pages.inventory.index', compact('inventories'))
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

       // $inventory = Inventory::create($request->all());
        $inv= new Inventory();
        $inv->ItemCode= $request->ItemCode;
        $inv->Quantity=$request->Quantity;
        $inv->UnitPrice=$request->UnitPrice;
        $inv->TotalPrice=$request->Quantity*$request->UnitPrice;
        $inv->CreatedUserId=Auth::user()->id;
        $inv->save();
        $old_item= Item::where('Item_code', $request->ItemCode)->first();
        Item::where('Item_code', $request->ItemCode)->update(
            ['amount'=> $old_item->amount+$inv->Quantity]
        );
        //$old_item->amount= $old_item->amount- $request->Quantity;

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
}

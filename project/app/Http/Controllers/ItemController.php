<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

/**
 * Class ItemController
 * @package App\Http\Controllers
 */
class ItemController extends Controller
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
    public function index(Request $request)
    {
       // echo json_encode($request->itemname);
       $itemcode=$request->itemcode;
       $itemname=$request->itemname;

        if($request->itemname!=null){
            $items = Item::where('ItemName',$request->itemname)->orderBy('ItemName','asc')->paginate();
        }else if($request->itemcode!=null){
      
            $items = Item::where('Item_code',$request->itemcode)->orderBy('ItemName','asc')->paginate();
        }else{
        $items = Item::orderby('ItemName','asc')->paginate();

        }
    
         return view('item.index', compact('items','itemname','itemcode'))
            ->with('i', (request()->input('page', 1) - 1) * $items->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new Item();
        return view('item.create', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Item::$rules);

        $item = Item::create($request->all());

         return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item=Item::where('Item_code',"=", $id)->first();
        return view('item.show', compact('item'));
    }
    public function details($id)
    {
        $item=Item::where('Item_code',"=", $id)->first();
        return response()->json(['details'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // $item = Item::find($id);
        $item=Item::where('Item_code',"=", $id)->first();
       
        return view('item.edit', compact('item'));
    }
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
      //  request()->validate(Item::$rules);
        return $item;

       // $item->update($request->all());

        // return redirect()->route('items.index')
        //     ->with('success', 'Item updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {  
        $item=Item::where('Item_code',"=", $id)->delete();
       // $item = Item::find($id)->delete();

        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\PriceChange;
use Illuminate\Http\Request;

/**
 * Class PriceChangeController
 * @package App\Http\Controllers
 */
class PriceChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priceChanges = PriceChange::select(
            'oldPrice',
            'price_changes.id',
            'price_changes.Item_code',
            'newPrice',
            'users.name as created_by',
            'price_changes.created_at',
            'ItemName')
            ->join('items', 'items.Item_code', '=', 'price_changes.Item_code')
        ->join('users', 'price_changes.created_by', '=', 'users.id')
        ->orderBy('price_changes.created_at','desc')->paginate();

        return view('price-change.index', compact('priceChanges'))
            ->with('i', (request()->input('page', 1) - 1) * $priceChanges->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priceChange = new PriceChange();
        return view('price-change.create', compact('priceChange'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(PriceChange::$rules);

        $priceChange = PriceChange::create($request->all());

        return redirect()->route('price-changes.index')
            ->with('success', 'PriceChange created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $priceChange = PriceChange::find($id);

        return view('price-change.show', compact('priceChange'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $priceChange = PriceChange::find($id);

        return view('price-change.edit', compact('priceChange'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PriceChange $priceChange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PriceChange $priceChange)
    {
        request()->validate(PriceChange::$rules);

        $priceChange->update($request->all());

        return redirect()->route('price-changes.index')
            ->with('success', 'PriceChange updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $priceChange = PriceChange::find($id)->delete();

        return redirect()->route('price-changes.index')
            ->with('success', 'PriceChange deleted successfully');
    }
}

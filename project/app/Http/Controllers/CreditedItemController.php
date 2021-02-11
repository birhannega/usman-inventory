<?php

namespace App\Http\Controllers;

use App\Models\CreditedItem;
use Illuminate\Http\Request;

/**
 * Class CreditedItemController
 * @package App\Http\Controllers
 */
class CreditedItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditedItems = CreditedItem::paginate();

        return view('credited-item.index', compact('creditedItems'))
            ->with('i', (request()->input('page', 1) - 1) * $creditedItems->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $creditedItem = new CreditedItem();
        return view('credited-item.create', compact('creditedItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate(CreditedItem::$rules);

        $creditedItem = CreditedItem::create($request->all());

        return redirect()->route('credited-items.index')
            ->with('success', 'CreditedItem created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creditedItem = CreditedItem::find($id);

        return view('credited-item.show', compact('creditedItem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $creditedItem = CreditedItem::find($id);

        return view('credited-item.edit', compact('creditedItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CreditedItem $creditedItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditedItem $creditedItem)
    {
        request()->validate(CreditedItem::$rules);

        $creditedItem->update($request->all());

        return redirect()->route('credited-items.index')
            ->with('success', 'CreditedItem updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $creditedItem = CreditedItem::find($id)->delete();

        return redirect()->route('credited-items.index')
            ->with('success', 'CreditedItem deleted successfully');
    }
}

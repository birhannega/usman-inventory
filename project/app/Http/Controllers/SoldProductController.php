<?php

namespace App\Http\Controllers;

use App\Models\SoldProduct;
use Illuminate\Http\Request;

/**
 * Class SoldProductController
 * @package App\Http\Controllers
 */
class SoldProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soldProducts = SoldProduct::paginate();

        return view('sold-product.index', compact('soldProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $soldProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $soldProduct = new SoldProduct();
        return view('sold-product.create', compact('soldProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SoldProduct::$rules);

        $soldProduct = SoldProduct::create($request->all());

        return redirect()->route('sold_products.index')
            ->with('success', 'SoldProduct created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $soldProduct = SoldProduct::find($id);

        return view('sold-product.show', compact('soldProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $soldProduct = SoldProduct::find($id);

        return view('sold-product.edit', compact('soldProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SoldProduct $soldProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SoldProduct $soldProduct)
    {
        request()->validate(SoldProduct::$rules);

        $soldProduct->update($request->all());

        return redirect()->route('sold_products.index')
            ->with('success', 'SoldProduct updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $soldProduct = SoldProduct::find($id)->delete();

        return redirect()->route('sold_products.index')
            ->with('success', 'SoldProduct deleted successfully');
    }
}

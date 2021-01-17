<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

/**
 * Class ProductCategoryController
 * @package App\Http\Controllers
 */
class ProductCategoryController extends Controller
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
        $productCategories = ProductCategory::paginate();

        return view('product-category.index', compact('productCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $productCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategory = new ProductCategory();
        return view('product-category.create', compact('productCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductCategory::$rules);

        $productCategory = ProductCategory::create($request->all());

        return redirect()->route('product-categories.index')
            ->with('success', 'ProductCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productCategory = ProductCategory::find($id);

        return view('product-category.show', compact('productCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory = ProductCategory::find($id);

        return view('product-category.edit', compact('productCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductCategory $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        request()->validate(ProductCategory::$rules);

        $productCategory->update($request->all());

        return redirect()->route('product-categories.index')
            ->with('success', 'ProductCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productCategory = ProductCategory::find($id)->delete();

        return redirect()->route('product-categories.index')
            ->with('success', 'ProductCategory deleted successfully');
    }
}

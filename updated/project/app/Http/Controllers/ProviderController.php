<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

/**
 * Class ProviderController
 * @package App\Http\Controllers
 */
class ProviderController extends Controller
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
        $providers = Provider::orderBy('id','desc')->paginate();

        return view('pages.provider.index', compact('providers'))
            ->with('i', (request()->input('page', 1) - 1) * $providers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provider = new Provider();
        return view('pages.provider.create', compact('provider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Provider::$rules);

        $provider = Provider::create($request->all());

        return redirect()->route('providers.index')
            ->with('success', 'Provider created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::find($id);

        return view('pages.provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::find($id);

        return view('pages.provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        request()->validate(Provider::$rules);

        $provider->update($request->all());

        return redirect()->route('providers.index')
            ->with('success', 'Provider updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $provider = Provider::find($id)->delete();

        return redirect()->route('providers.index')
            ->with('success', 'Provider deleted successfully');
    }
}

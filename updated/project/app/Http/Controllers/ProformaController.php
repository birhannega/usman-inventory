<?php

namespace App\Http\Controllers;

use App\Models\Proforma;
use Illuminate\Http\Request;

/**
 * Class ProformaController
 * @package App\Http\Controllers
 */
class ProformaController extends Controller
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
        $proformas = Proforma::paginate();

        return view('proforma.index', compact('proformas'))
            ->with('i', (request()->input('page', 1) - 1) * $proformas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proforma = new Proforma();
        return view('proforma.create', compact('proforma'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proforma::$rules);

        $new_proforma = Proforma::create($request->all());
     
         return redirect()->route('proformas.index')
             ->with('success', 'Proforma created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proforma=Proforma::where('p_id',"=", $id)->first();

        return view('proforma.show', compact('proforma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proforma=Proforma::where('p_id',"=", $id)->first();

        return view('proforma.edit', compact('proforma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proforma $proforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proforma $proforma)
    {
        request()->validate(Proforma::$rules);

        $proforma->update($request->all());

        return redirect()->route('proformas.index')
            ->with('success', 'Proforma updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proforma=Proforma::where('p_id',"=", $id)->first();

        return redirect()->route('proformas.index')
            ->with('success', 'Proforma deleted successfully');
    }
}

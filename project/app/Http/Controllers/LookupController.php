<?php

namespace App\Http\Controllers;

use App\Models\Lookup;
use App\Models\LookupType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class LookupController
 * @package App\Http\Controllers
 */
class LookupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $lookups = DB::table('lookups')->orderby('lookups.created_at','desc')
        ->select(
        'lookups.description_am',
        'lookups.description_en',
        'lookupId',
        'lookups.created_at',
        'lookups.lookuptypeId',
        'lookup_types.description_am as typedescamh',
        'lookup_types.description_en as typedescen'
        )
            ->join('lookup_types', 'lookups.lookuptypeId', '=', 'lookup_types.ltId')
        ->paginate();



     //   $lookups = Lookup::orderBy('lookups.created_at','desc')
        //->join('lookup_types', 'lookups.lookupId', '=', 'lookup_types.ltId')
      //  ->paginate();
        return view('lookup.index', compact('lookups'))
            ->with('i', (request()->input('page', 1) - 1) * $lookups->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lookup = new Lookup();
         
        $lookupTypes= LookupType::all();
        // $items = Item::pluck('ItemName', 'Item_code');
         $selected = LookupType::first()->description_en;
        return view('lookup.create', compact('lookup','lookupTypes','selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Lookup::$rules);

        $lookup = Lookup::create($request->all());

        return redirect()->route('lookups.index')
            ->with('success', 'Lookup created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lookup = Lookup::find($id);

        return view('lookup.show', compact('lookup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lookup = Lookup::find($id);

        return view('lookup.edit', compact('lookup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Lookup $lookup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lookup $lookup)
    {
        request()->validate(Lookup::$rules);

        $lookup->update($request->all());

        return redirect()->route('lookups.index')
            ->with('success', 'Lookup updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lookup = Lookup::find($id)->delete();

        return redirect()->route('lookups.index')
            ->with('success', 'Lookup deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\LookupType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class LookupTypeController
 * @package App\Http\Controllers
 */
class LookupTypeController extends Controller
{
    /** `       `
     * Display a listing of the lookup.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lookupTypes = LookupType::paginate();

        return view('lookup-type.index', compact('lookupTypes'))
            ->with('i', (request()->input('page', 1) - 1) * $lookupTypes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lookupType = new LookupType();
        return view('lookup-type.create', compact('lookupType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LookupType::$rules);

        $lookupType = LookupType::create($request->all());

        return redirect()->route('lookup-types.index')
            ->with('success', 'LookupType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lookupType=LookupType::where('ltId',"=", $id)->first();

        return view('lookup-type.show', compact('lookupType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lookupType = LookupType::find($id);

        return view('lookup-type.edit', compact('lookupType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LookupType $lookupType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LookupType $lookupType)
    {
        request()->validate(LookupType::$rules);

        $lookupType->update($request->all());

        return redirect()->route('lookup-types.index')
            ->with('success', 'LookupType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lookupType = LookupType::find($id)->delete();

        return redirect()->route('lookup-types.index')
            ->with('success', 'LookupType deleted successfully');
    }
}

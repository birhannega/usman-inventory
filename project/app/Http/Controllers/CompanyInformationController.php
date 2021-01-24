<?php

namespace App\Http\Controllers;

use App\Models\CompanyInformation;
use Illuminate\Http\Request;

/**
 * Class CompanyInformationController
 * @package App\Http\Controllers
 */
class CompanyInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companyInformations = CompanyInformation::paginate();

        return view('company-information.index', compact('companyInformations'))
            ->with('i', (request()->input('page', 1) - 1) * $companyInformations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companyInformation = new CompanyInformation();
        return view('company-information.create', compact('companyInformation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CompanyInformation::$rules);

        $companyInformation = CompanyInformation::create($request->all());

        return redirect()->route('company-informations.index')
            ->with('success', 'CompanyInformation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companyInformation = CompanyInformation::find($id);

        return view('company-information.show', compact('companyInformation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companyInformation = CompanyInformation::find($id);

        return view('company-information.edit', compact('companyInformation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CompanyInformation $companyInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyInformation $companyInformation)
    {
        request()->validate(CompanyInformation::$rules);

        $companyInformation->update($request->all());

        return redirect()->route('company-informations.index')
            ->with('success', 'CompanyInformation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $companyInformation = CompanyInformation::find($id)->delete();

        return redirect()->route('company-informations.index')
            ->with('success', 'CompanyInformation deleted successfully');
    }
}

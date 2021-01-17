<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;

/**
 * Class TransferController
 * @package App\Http\Controllers
 */
class TransferController extends Controller
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
        $transfers = Transfer::paginate();

        return view('transfer.index', compact('transfers'))
            ->with('i', (request()->input('page', 1) - 1) * $transfers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transfer = new Transfer();
        return view('transfer.create', compact('transfer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Transfer::$rules);

        $transfer = Transfer::create($request->all());

        return redirect()->route('transfers.index')
            ->with('success', 'Transfer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transfer = Transfer::find($id);

        return view('transfer.show', compact('transfer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transfer = Transfer::find($id);

        return view('transfer.edit', compact('transfer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Transfer $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        request()->validate(Transfer::$rules);

        $transfer->update($request->all());

        return redirect()->route('transfers.index')
            ->with('success', 'Transfer updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $transfer = Transfer::find($id)->delete();

        return redirect()->route('transfers.index')
            ->with('success', 'Transfer deleted successfully');
    }
}

<?php

namespace KPO\Http\Controllers;

use KPO\Taxpayer;
use Illuminate\Http\Request;

class TaxpayersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('taxpayers.index', ['taxpayers' => Taxpayer::select('id', 'obveznik')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('taxpayers.create', ['taxpayer' => new Taxpayer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pib'      => 'required|numeric',
            'obveznik' => 'required',
            'sediste'  => 'required',
        ]);

        Taxpayer::create($request->all());

        return redirect()->route('taxpayers.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \KPO\Taxpayer $taxpayer
     *
     * @return void
     */
    public function edit(Taxpayer $taxpayer)
    {
        return view('taxpayers.edit', compact('taxpayer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \KPO\Taxpayer            $taxpayer
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxpayer $taxpayer)
    {
        $request->validate([
            'pib'      => 'required|numeric',
            'obveznik' => 'required',
            'sediste'  => 'required',
        ]);

        $taxpayer->update($request->all());

        return redirect()->route('taxpayers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \KPO\Taxpayer $taxpayer
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Taxpayer $taxpayer)
    {
        $taxpayer->delete();

        return response()->json(null, 200);
    }
}

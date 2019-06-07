<?php

namespace KPO\Http\Controllers;

use KPO\Http\Requests\TaxpayerRequest;
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
        return view('taxpayers.index', ['taxpayers' => Taxpayer::select('id', 'name')->get()]);
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
     * @param \KPO\Http\Requests\TaxpayerRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TaxpayerRequest $request)
    {
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
     * @param \KPO\Http\Requests\TaxpayerRequest $request
     * @param \KPO\Taxpayer                      $taxpayer
     *
     * @return \Illuminate\Http\Response
     */
    public function update(TaxpayerRequest $request, Taxpayer $taxpayer)
    {
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

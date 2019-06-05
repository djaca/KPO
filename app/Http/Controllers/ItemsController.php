<?php

namespace KPO\Http\Controllers;

use KPO\Item;
use KPO\Taxpayer;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create', ['item' => new Item]);
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
            'date'          => 'required|date',
            'description'   => 'required|max:50',
            'product_value' => 'nullable|required_without:service_value|regex:/^\d+(\.\d{1,2})?$/',
            'service_value' => 'nullable|required_without:product_value|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $taxpayer = Taxpayer::find($request->cookie('taxpayer'));

        $taxpayer->items()->create($request->all());

        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \KPO\Item $item
     *
     * @return void
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \KPO\Item                $item
     *
     * @return void
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'date'          => 'required|date',
            'description'   => 'required|max:50',
            'product_value' => 'nullable|required_without:service_value|regex:/^\d+(\.\d{1,2})?$/',
            'service_value' => 'nullable|required_without:product_value|regex:/^\d+(\.\d{1,2})?$/',
        ]);

        $item->update($request->all());


        return redirect()->home();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \KPO\Item $item
     *
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Item $item)
    {
        $item->delete();


        return back();
    }
}

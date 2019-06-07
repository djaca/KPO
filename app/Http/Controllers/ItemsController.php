<?php

namespace KPO\Http\Controllers;

use KPO\Http\Requests\ItemRequest;
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
     * @param \KPO\Http\Requests\ItemRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        Item::create($request->all());

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
     * @param \KPO\Http\Requests\ItemRequest $request
     * @param \KPO\Item                      $item
     *
     * @return void
     */
    public function update(ItemRequest $request, Item $item)
    {
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

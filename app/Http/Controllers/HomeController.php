<?php

namespace KPO\Http\Controllers;

use KPO\Item;
use KPO\Pages;
use KPO\Taxpayer;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $taxpayer = Taxpayer::find(request()->cookie('taxpayer'));

        if (!$taxpayer) {
            return redirect()->route('taxpayers.index');
        }

        $items = Item::select(['id', 'taxpayer_id', 'description', 'date', 'product_value', 'service_value'])
                     ->where('taxpayer_id', $taxpayer->id)
                     ->orderBy('date')
                     ->get()
                     ->map(function ($i, $key) {
                         $i['ordinal_num'] = $key + 1;

                         $i['sum'] = $i['product_value'] + $i['service_value'];

                         return $i;
                     });

        $pages = Pages::format($items);

        if(request()->has('download')) {
            return PDF::loadHtml(view('pdf.document', compact('pages', 'taxpayer')))
                      ->download('invoices.pdf');
        }

        return view('home', compact('pages', 'taxpayer'));
    }
}

<?php

namespace KPO\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Cookie;
use KPO\Item;
use KPO\Pages;
use KPO\Taxpayer;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $taxpayer = Taxpayer::find(request()->cookie('taxpayer'));

        if (!$taxpayer) {
            Cookie::queue(Cookie::forget('taxpayer'));

            return redirect()->route('taxpayers.index');
        }

        $pages = $this->getParsedItems($taxpayer->id);

        $taxpayer = [
            'PIB'                      => $taxpayer->id,
            'Obveznik'                 => $taxpayer->name,
            'Sediste'                  => $taxpayer->place,
            'Sifra poreskog obveznika' => $taxpayer->taxpayer_code,
            'Sifra delatnosti'         => $taxpayer->activity_code,
        ];

        $data = compact('pages', 'taxpayer');

        if (request()->has('download')) {
            return PDF::loadHtml(view('pdf.document', $data))->download('invoices.pdf');
        }

        return view('home', $data);
    }

    /**
     * @param $taxpayerId
     *
     * @return mixed
     */
    private function getParsedItems($taxpayerId)
    {
        return Cache::rememberForever("itemsForTaxpayer.{$taxpayerId}", function () use ($taxpayerId) {
            $items = Item::select(['id', 'taxpayer_id', 'description', 'date', 'product_value', 'service_value'])
                         ->where('taxpayer_id', $taxpayerId)
                         ->orderBy('date')
                         ->get()
                         ->map(function ($i, $key) {
                             $i['ordinal_num'] = $key + 1;

                             $i['sum'] = $i['product_value'] + $i['service_value'];

                             return $i;
                         });

            return Pages::format($items);
        });
    }
}

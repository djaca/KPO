<?php

namespace KPO\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use KPO\Pages;
use Barryvdh\Snappy\Facades\SnappyPdf as PDF;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function index()
    {
        $data = [
            'pages' => $this->formatPages(),
            'taxpayer' => $this->parseTaxpayerData()
        ];

        if (request()->has('download')) {
            return PDF::loadHtml(view('pdf.document', $data))->download('invoices.pdf');
        }

        return view('home', $data);
    }

    /**
     * @return array
     */
    private function formatPages()
    {
        return Cache::rememberForever('itemsForTaxpayer.' . request()->taxpayer->id, function () {
            $items = request()->taxpayer
                ->items()
                ->orderBy('date')
                ->get()
                ->map(function ($item, $key) {
                    $item['ordinal_num'] = $key + 1;

                    $item['sum'] = $item['product_value'] + $item['service_value'];

                    return $item;
                });

            return Pages::format($items);
        });
    }

    /**
     * @return array|mixed
     */
    public function parseTaxpayerData()
    {
        $taxpayer = request()->taxpayer;

        return [
            'PIB'                      => $taxpayer->id,
            'Obveznik'                 => $taxpayer->name,
            'Sediste'                  => $taxpayer->place,
            'Sifra poreskog obveznika' => $taxpayer->taxpayer_code,
            'Sifra delatnosti'         => $taxpayer->activity_code,
        ];
    }
}

<?php

namespace KPO;

use Illuminate\Support\Collection;

class Pages
{
    const FIRST_PAGE_COUNT = 35;

    const PER_PAGE = 47;

    /**
     * @var Collection
     */
    private static $items;

    /**
     * @var integer
     */
    private static $numOfPages;

    /**
     * @param \Illuminate\Support\Collection $items
     *
     * @return array
     */
    public static function format(Collection $items)
    {
        self::$items = $items;

        static::$numOfPages = floor((self::$items->count() - self::FIRST_PAGE_COUNT) / self::PER_PAGE);

        if (count(self::$items) < self::FIRST_PAGE_COUNT) {
            $lastPage = self::parseLastPage();

            return compact('lastPage');
        }

        $firstPage = self::parseFirstPage();

        $middlePages = self::parseMiddlePages($firstPage['prenos']);

        $lastPage = self::parseLastPage($middlePages->last()['prenos']);

        return compact('firstPage', 'middlePages', 'lastPage');

    }

    /**
     * @return array
     */
    private static function parseFirstPage()
    {
        $items = collect(self::$items->splice(0, self::FIRST_PAGE_COUNT));

        $data = [
            'data'   => $items,
            'prenos' => collect([
                'products_sum' => round($items->sum('product_value'), 2),
                'services_sum' => round($items->sum('service_value'), 2),
                'sum'          => round($items->sum('sum'), 2)
            ])
        ];

        return $data;
    }

    /**
     * @param $donos
     *
     * @return \Illuminate\Support\Collection
     */
    private static function parseMiddlePages($donos)
    {
        $middlePages = collect();

        for ($i = 0; $i < self::$numOfPages; $i++) {
            if ($i !== 0) {
                $donos = $middlePages[$i - 1]['prenos'];
            }

            $data = self::$items->splice(0, self::PER_PAGE);

            $prenos = collect([
                'products_sum' => round($data->sum('product_value') + $donos['products_sum'], 2),
                'services_sum' => round($data->sum('service_value') + $donos['services_sum'], 2),
                'sum'          => round($data->sum('sum') + $donos['sum'], 2)
            ]);

            $middlePages->push(compact('data', 'prenos', 'donos'));
        }

        return $middlePages;
    }

    /**
     * @param $donos
     *
     * @return array
     */
    private static function parseLastPage($donos = null)
    {
        $items = self::$items;

        $data = [
            'data' => $items
        ];

        if ($donos) {
            $data['donos'] = $donos;
        }

        $data['total'] = collect([
            'products_sum' => round($items->sum('product_value')+ $donos['products_sum'], 2),
            'services_sum' => round($items->sum('service_value') + $donos['services_sum'], 2),
            'sum'          => round($items->sum('sum') + $donos['sum'], 2)
        ]);

        return $data;
    }
}

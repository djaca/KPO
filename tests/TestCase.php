<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use KPO\Item;
use KPO\Taxpayer;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    /**
     * @var Taxpayer
     */
    protected $taxpayer;

    /**
     * @var Item
     */
    protected $item;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->taxpayer = factory(Taxpayer::class)->create();

        $this->item = factory(Item::class)->create(['taxpayer_id' => $this->taxpayer->id]);
    }

    /**
     * @param       $method
     * @param       $uri
     * @param array $parameters
     *
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    protected function callWithTaxpayerCookie($method, $uri, $parameters = [])
    {
        return $this->call($method, $uri, $parameters, ['taxpayerId' => $this->taxpayer->id]);
    }
}

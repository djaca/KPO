<?php

namespace Tests\Unit;

use KPO\Taxpayer;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaxpayerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_all_fields()
    {
        $taxpayer = factory(Taxpayer::class)->create([
            'pib'                      => 123456789,
            'obveznik'                 => 'Company name',
            'sediste'                  => 'Address and town',
            'sifra_poreskog_obveznika' => 123,
            'sifra_delatnosti'         => 456
        ]);

        $this->assertEquals(123456789, $taxpayer->pib);
        $this->assertEquals('Company name', $taxpayer->obveznik);
        $this->assertEquals('Address and town', $taxpayer->sediste);
        $this->assertEquals(123, $taxpayer->sifra_poreskog_obveznika);
        $this->assertEquals(456, $taxpayer->sifra_delatnosti);
        $this->assertInstanceOf(Collection::class, $taxpayer->items);
    }
}

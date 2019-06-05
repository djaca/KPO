<?php

namespace Tests\Feature;

use KPO\Taxpayer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TaxpayerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_add_new_taxpayer()
    {
        $taxpayer = factory(Taxpayer::class)->make();

        $this->post(route('taxpayers.store'), $taxpayer->toArray());

        $this->assertDatabaseHas('taxpayers', [
            'pib'                      => $taxpayer->pib,
            'obveznik'                 => $taxpayer->obveznik,
            'sediste'                  => $taxpayer->sediste,
            'sifra_poreskog_obveznika' => $taxpayer->sifra_poreskog_obveznika,
            'sifra_delatnosti'         => $taxpayer->sifra_delatnosti
        ]);
    }

    /** @test */
    public function can_update_taxpayer()
    {
        $taxpayer = factory(Taxpayer::class)->create();

        $data = [
            'pib'                      => 1234,
            'obveznik'                 => 'Edited company name',
            'sediste'                  => 'Edited address',
            'sifra_poreskog_obveznika' => 456,
            'sifra_delatnosti'         => 789
        ];

        $this->patch(route('taxpayers.update', $taxpayer->id), $data);

        $this->assertDatabaseHas('taxpayers', $data);
    }

    /** @test */
    public function can_delete_taxpayer()
    {
        $taxpayer = factory(Taxpayer::class)->create();

        $this->assertDatabaseHas('taxpayers', [
            'obveznik' => $taxpayer->obveznik
        ]);

        $this->delete(route('taxpayers.destroy', $taxpayer->id));

        $this->assertDatabaseMissing('taxpayers', [
            'obveznik' => $taxpayer->obveznik
        ]);
    }
}

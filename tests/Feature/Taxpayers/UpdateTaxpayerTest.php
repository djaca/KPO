<?php

namespace Tests\Feature\Taxpayers;

use KPO\Taxpayer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateTaxpayerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_update_taxpayer()
    {
        $this->patch(
            route('taxpayers.update', $this->taxpayer->id),
            $data = factory(Taxpayer::class)->make()->toArray()
        );

        $this->assertDatabaseHas('taxpayers', $data);
    }
}

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
            'id'            => $taxpayer->id,
            'name'          => $taxpayer->name,
            'place'         => $taxpayer->place,
            'taxpayer_code' => $taxpayer->taxpayer_code,
            'activity_code' => $taxpayer->activity_code
        ]);
    }

    /** @test */
    public function can_update_taxpayer()
    {
        $taxpayer = factory(Taxpayer::class)->create();

        $data = [
            'id'            => 1234,
            'name'          => 'Edited company name',
            'place'         => 'Edited address',
            'taxpayer_code' => 456,
            'activity_code' => 789
        ];

        $this->patch(route('taxpayers.update', $taxpayer->id), $data);

        $this->assertDatabaseHas('taxpayers', $data);
    }

    /** @test */
    public function can_delete_taxpayer()
    {
        $taxpayer = factory(Taxpayer::class)->create();

        $this->assertDatabaseHas('taxpayers', [
            'name' => $taxpayer->name
        ]);

        $this->delete(route('taxpayers.destroy', $taxpayer->id));

        $this->assertDatabaseMissing('taxpayers', [
            'name' => $taxpayer->name
        ]);
    }
}

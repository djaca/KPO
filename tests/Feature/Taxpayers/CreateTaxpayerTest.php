<?php

namespace Tests\Feature\Taxpayers;

use KPO\Taxpayer;
use Tests\TestCase;

class CreateTaxpayerTest extends TestCase
{
    /** @test */
    public function can_add_new_taxpayer()
    {
        $this->createTaxpayer($data = factory(Taxpayer::class)->make()->toArray());

        $this->assertDatabaseHas('taxpayers', $data);
    }

    /** @test */
    public function it_requires_an_id_to_be_numeric_and_unique()
    {
        $this->createTaxpayer(['id' => null])
            ->assertSessionHasErrors('id');

        $this->createTaxpayer(['id' => 'string'])
             ->assertSessionHasErrors('id');

        $taxpayer = factory(Taxpayer::class)->create();

        $this->createTaxpayer(['id' => $taxpayer->id])
             ->assertSessionHasErrors('id');

        $this->createTaxpayer(['id' => 123])
             ->assertSessionDoesntHaveErrors('id');
    }

    /** @test */
    public function it_requires_a_name()
    {
        $this->createTaxpayer(['name' => null])
             ->assertSessionHasErrors('name');
    }

    /** @test */
    public function it_requires_a_place()
    {
        $this->createTaxpayer(['place' => null])
             ->assertSessionHasErrors('place');
    }

    private function createTaxpayer($overrides = [])
    {
        return $this->post(route('taxpayers.store'), $overrides);
    }
}

<?php

namespace Tests\Feature\Items;

use Carbon\Carbon;
use KPO\Item;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_add_new_item()
    {
        $data = factory(Item::class)->make(['taxpayer_id' => $this->taxpayer->id])->toArray();

        $this->createItem($data);

        $this->assertDatabaseHas('items', $data);
    }

    /** @test */
    public function it_requires_an_taxpayer_id_that_exists_in_database()
    {
        $this->createItem(['taxpayer_id' => null])
             ->assertSessionHasErrors('taxpayer_id');

        $this->createItem(['taxpayer_id' => 999])
             ->assertSessionHasErrors('taxpayer_id');

        $this->createItem(['taxpayer_id' => $this->taxpayer->id])
             ->assertSessionDoesntHaveErrors('taxpayer_id');
    }

    /** @test */
    public function it_requires_a_valid_date()
    {
        $this->createItem(['date' => null])
             ->assertSessionHasErrors('date');

        $this->createItem(['date' => 'not-date-format'])
             ->assertSessionHasErrors('date');

        $this->createItem(['date' => Carbon::now()->toDateString()])
             ->assertSessionDoesntHaveErrors('date');
    }

    /** @test */
    public function it_requires_a_description_50_chars_max()
    {
        $this->createItem(['description' => null])
             ->assertSessionHasErrors('description');

        $this->createItem(['description' => str_repeat('c', 51)])
             ->assertSessionHasErrors('description');

        $this->createItem(['description' => str_repeat('c', 50)])
             ->assertSessionDoesntHaveErrors('description');
    }

    /** @test */
    public function it_requires_a_product_value_2_decimals_max_if_service_value_is_missing()
    {
        $this->createItem(['product_value' => null, 'service_value' => null])
             ->assertSessionHasErrors('product_value');

        $this->createItem(['product_value' => 26.369])
             ->assertSessionHasErrors('product_value');

        $this->createItem(['product_value' => null, 'service_value' => 1])
             ->assertSessionDoesntHaveErrors('product_value');
    }

    /** @test */
    public function it_requires_a_service_value_2_decimals_max_if_product_value_is_missing()
    {
        $this->createItem(['product_value' => null, 'service_value' => null])
             ->assertSessionHasErrors('service_value');

        $this->createItem(['service_value' => 26.369])
             ->assertSessionHasErrors('service_value');

        $this->createItem(['product_value' => 1, 'service_value' => null])
             ->assertSessionDoesntHaveErrors('service_value');
    }

    private function createItem($overrides = [])
    {
        return $this->call('POST', route('items.store'), $overrides, ['taxpayer' => $this->taxpayer->id]);
    }
}

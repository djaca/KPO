<?php

namespace Tests\Feature\Items;

use KPO\Item;
use KPO\Taxpayer;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_update_an_item()
    {
        $data = factory(Item::class)->make(['taxpayer_id' => $this->taxpayer->id])->toArray();

        $this->call('PATCH', route('items.update', $this->item->id), $data, ['taxpayer' => $this->taxpayer->id]);

        $this->assertDatabaseHas('items', $data);
    }
}

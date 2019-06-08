<?php

namespace Tests\Feature\Items;

use KPO\Item;
use Tests\TestCase;

class UpdateItemTest extends TestCase
{
    /** @test */
    public function can_update_an_item()
    {
        $data = factory(Item::class)->make(['taxpayer_id' => $this->taxpayer->id])->toArray();

        $this->callWithTaxpayerCookie('PATCH', route('items.update', $this->item->id), $data);

        $this->assertDatabaseHas('items', $data);
    }
}

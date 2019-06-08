<?php

namespace Tests\Feature\Items;

use Tests\TestCase;

class DeleteItemTest extends TestCase
{
    /** @test */
    public function can_delete_an_item()
    {
        $this->assertDatabaseHas('items', [
            'id' => $this->item->id
        ]);

        $this->callWithTaxpayerCookie('DELETE', route('items.destroy', $this->item->id));

        $this->assertDatabaseMissing('items', [
            'id' => $this->item->id
        ]);
    }
}

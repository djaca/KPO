<?php

namespace Tests\Feature\Items;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_delete_an_item()
    {
        $this->call('DELETE', route('items.destroy', $this->item->id), [], ['taxpayer' => $this->taxpayer->id]);

        $this->assertDatabaseMissing('items', [
            'id' => $this->item->id
        ]);
    }
}

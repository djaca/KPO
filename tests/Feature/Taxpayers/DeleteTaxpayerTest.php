<?php

namespace Tests\Feature\Taxpayers;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteTaxpayerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_delete_taxpayer()
    {
        $this->delete(route('taxpayers.destroy', $this->taxpayer->id));

        $this->assertDatabaseMissing('taxpayers', ['id' => $this->taxpayer->id]);
    }
}

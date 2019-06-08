<?php

namespace Tests\Feature\Taxpayers;

use Tests\TestCase;

class DeleteTaxpayerTest extends TestCase
{
    /** @test */
    public function can_delete_taxpayer()
    {
        $this->delete(route('taxpayers.destroy', $this->taxpayer->id));

        $this->assertDatabaseMissing('taxpayers', ['id' => $this->taxpayer->id]);
    }
}

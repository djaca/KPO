<?php

namespace Tests\Unit;

use KPO\Item;
use KPO\Taxpayer;
use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_all_fields()
    {
        $item = factory(Item::class)->create([
            'date'          => $date = Carbon::now()->toDateString(),
            'description'   => 'Description',
            'product_value' => 26.48,
            'service_value' => 45.77
        ]);

        $this->assertEquals($date, $item->date->toDateString());
        $this->assertEquals('Description', $item->description);
        $this->assertEquals(26.48, $item->product_value);
        $this->assertEquals(45.77, $item->service_value);
        $this->assertInstanceOf(Taxpayer::class, $item->taxpayer);
    }
}

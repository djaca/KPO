<?php

namespace Tests\Unit;

use App\Item;
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
            'date'          => $date = Carbon::now()->toDate(),
            'description'   => 'Description',
            'product_value' => 26.48,
            'service_value' => 45.77
        ]);

        $this->assertEquals('Description', $item->description);
        $this->assertEquals($date, $item->date);
        $this->assertEquals(26.48, $item->product_value);
        $this->assertEquals(45.77, $item->service_value);
    }
}

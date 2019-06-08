<?php

namespace Tests\Unit;

use KPO\Taxpayer;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class TaxpayerTest extends TestCase
{
    /** @test */
    public function it_has_all_fields()
    {
        $taxpayer = factory(Taxpayer::class)->create([
            'id'            => 123456789,
            'name'          => 'Company name',
            'place'         => 'Address and town',
            'taxpayer_code' => 123,
            'activity_code' => 456
        ]);

        $this->assertEquals(123456789, $taxpayer->id);
        $this->assertEquals('Company name', $taxpayer->name);
        $this->assertEquals('Address and town', $taxpayer->place);
        $this->assertEquals(123, $taxpayer->taxpayer_code);
        $this->assertEquals(456, $taxpayer->activity_code);
        $this->assertInstanceOf(Collection::class, $taxpayer->items);
    }
}

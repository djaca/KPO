<?php

use Illuminate\Database\Seeder;
use KPO\Item;
use KPO\Taxpayer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $taxpayers = factory(Taxpayer::class, 2)->create();

        factory(Item::class, 5)->create(['taxpayer_id' => $taxpayers->first()->id]);
        factory(Item::class, 70)->create(['taxpayer_id' => $taxpayers->last()->id]);
    }
}

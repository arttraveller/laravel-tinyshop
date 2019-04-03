<?php

use App\Shop\Models\Characteristic;
use Illuminate\Database\Seeder;

class ShopCharacteristicTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Characteristic::class, 10)->create();
    }

}

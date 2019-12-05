<?php

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class ShopAttributesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Attribute::class, 10)->create();
    }

}

<?php

use App\Models\Brand;
use Illuminate\Database\Seeder;

class ShopBrandsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Brand::class, 10)->create();
    }

}

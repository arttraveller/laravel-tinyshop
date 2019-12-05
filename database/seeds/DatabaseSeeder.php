<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ShopBrandsTableSeeder::class);
        $this->call(ShopTagsTableSeeder::class);
        $this->call(ShopCategoriesTableSeeder::class);
        $this->call(ShopAttributesTableSeeder::class);
        $this->call(ShopProductsTableSeeder::class);
    }

}

<?php

use App\Shop\Models\Tag;
use Illuminate\Database\Seeder;

class ShopTagsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class, 10)->create();
    }

}

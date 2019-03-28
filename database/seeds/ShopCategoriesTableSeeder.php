<?php

use App\Shop\Models\Category;
use Illuminate\Database\Seeder;
use Kalnoy\Nestedset\Collection;

class ShopCategoriesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 2)->create()->each(function(Category $category) {
            $category->children()->saveMany($this->generateCategories()->each(function(Category $category) {
                $category->children()->saveMany($this->generateCategories());
            }));
        });
    }



    private function generateCategories(): Collection
    {
        $num = random_int(0, 5);

        return factory(Category::class, $num)->create();
    }

}

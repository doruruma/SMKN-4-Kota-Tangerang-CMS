<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat = new Category;
        $cat->category = "News";
        $cat->slug = "news";
        $cat->save();

        $cat = new Category;
        $cat->category = "Articles";
        $cat->slug = "articles";
        $cat->save();

        $cat = new Category;
        $cat->category = "Prestasi";
        $cat->slug = "prestasi";
        $cat->save();

        $cat = new Category;
        $cat->category = "Events";
        $cat->slug = "events";
        $cat->save();
    }
}

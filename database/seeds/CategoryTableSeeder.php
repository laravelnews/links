<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->truncate();

        \App\Category::create([
            'name' => 'Tips & Tutorials',
            'slug' => 'tips-tutorials',
        ]);
        \App\Category::create([
            'name' => 'Packages',
            'slug' => 'packages',
        ]);
        \App\Category::create([
            'name' => 'Applications',
            'slug' => 'apps',
        ]);
    }
}
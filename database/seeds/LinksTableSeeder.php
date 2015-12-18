<?php

use Illuminate\Database\Seeder;

class LinksTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('links')->truncate();

        factory(App\Links::class, 10)->create();

        \App\Links::create([
            'category_id' => 2,
            'user_id' => 1,
            'title' => 'Laravel Permission',
            'url' => 'https://github.com/spatie/laravel-permission',
            'description' => 'This package allows to save permissions and roles in a database.',
            'published' => 1,
        ]);
    }

}

<?php

namespace unit;

use TestCase;
use App\Category;

class CategoryTest  extends TestCase
{
    public function testItReturnsAnIcon()
    {
        $category = factory(Category::class)->make([
            'slug' => 'tips-tutorials',
        ]);

        $this->assertEquals('fa-lightbulb-o', $category->icon());
    }
}
<?php

namespace Tests\Unit;

use TestCase;
use App\Links;

class LinksTest extends TestCase
{
    public function testItCreatesHostName()
    {
        $link = factory(Links::class)->create([
            'url' => 'https://laravel-news.com/2015/11/laravel-5-2-a-look-at-whats-coming/',
        ]);

        $this->assertEquals('laravel-news.com', $link->hostName());
    }
}
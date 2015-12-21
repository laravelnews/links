<?php

namespace Tests\Unit;

use TestCase;
use App\Links;

class LinksTest extends TestCase
{
    public function testItCreatesHostName()
    {
        $link = factory(Links::class)->make([
            'url' => 'https://laravel-news.com/2015/11/laravel-5-2-a-look-at-whats-coming/',
        ]);

        $this->assertEquals('laravel-news.com', $link->hostName());
    }

    public function testItGeneratesSlug()
    {
        $link = factory(Links::class)->make([
            'id' => 100,
            'title' => 'Laravel News',
        ]);

        $this->assertEquals('100-laravel-news', $link->slug);
    }

    public function testItGeneratesFancyTitle()
    {
        $link = factory(Links::class)->make([
            'title' => 'Laravel News "My Test"',
        ]);

        $this->assertEquals('Laravel News <i>"My Test"</i>', $link->title);

        $link = factory(Links::class)->make([
            'title' => 'Laravel News (My Test)',
        ]);

        $this->assertEquals('Laravel News <i>(My Test)</i>', $link->title);

        $link = factory(Links::class)->make([
            'title' => 'Dashing -- Title',
        ]);

        $this->assertEquals('Dashing — Title', $link->title);

        $link = factory(Links::class)->make([
            'title' => 'Test & Stuff',
        ]);

        $this->assertEquals('Test <i>&amp;</i> Stuff', $link->title);
    }

    public function testItGeneratesFancyTitleWithMultiple()
    {
        $link = factory(Links::class)->make([
            'title' => 'Laravel & Vue -- With "awesome stuff"',
        ]);

        $this->assertEquals('Laravel <i>&amp;</i> Vue — With <i>"awesome stuff"</i>', $link->title);
    }
}
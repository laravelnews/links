<?php

namespace Tests\Acceptance;

use App\User;
use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubmitTest extends TestCase
{
    use DatabaseTransactions;

    public function testSubmitRouteShowsForm()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit('/submit')
            ->see('Submit a new resource');
    }

    public function testSubmitValidates()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit('/submit')
            ->type('Testing', 'title')
            ->press('Submit')
            ->see('Whoops');
    }

    public function testSubmitFormSaves()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit('/submit')
            ->type('Testing', 'title')
            ->type('https://laravel-news.com', 'url')
            ->type('My cool description', 'description')
            ->select('1', 'category_id')
            ->press('Submit')
            ->seeInDatabase('links', ['title' => 'Testing']);
    }

    public function testFlashMessageShows()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->visit('/submit')
            ->type('Testing', 'title')
            ->type('https://laravel-news.com', 'url')
            ->type('My cool description', 'description')
            ->select('1', 'category_id')
            ->press('Submit')
            ->see('Link submitted for approval');
    }
}
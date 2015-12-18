<?php

namespace Tests\Acceptance;

use App\User;
use TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    public function testLoginRoute()
    {
        $this->visit('/login')
            ->see('Login');
    }

    public function testLogin()
    {
        factory(User::class)->create([
            'email' => 'demo@demo.com',
            'password' => bcrypt('password1234')
        ]);

        $this->visit('/login')
            ->type('demo@demo.com', 'email')
            ->type('password1234', 'password')
            ->press('Login')
            ->seePageIs('/home');
    }

    public function testFailedLogin()
    {
        factory(User::class)->create([
            'email' => 'demo@demo.com',
            'password' => bcrypt('password1234')
        ]);

        $this->visit('/login')
            ->type('demo@demo.com', 'email')
            ->type('password', 'password')
            ->press('Login')
            ->see('These credentials do not match our records');
    }

    public function testNewUserRegistration()
    {
        $this->visit('/register')
            ->type('Taylor', 'name')
            ->type('demo@demo2.com', 'email')
            ->type('password1234', 'password')
            ->type('password1234', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/home');
    }

    public function testNewUserRegistrationFailed()
    {
        factory(User::class)->create([
            'email' => 'demo@demo.com',
            'password' => bcrypt('password1234')
        ]);

        $this->visit('/register')
            ->type('Taylor', 'name')
            ->type('demo@demo.com', 'email')
            ->type('password1234', 'password')
            ->type('password1234', 'password_confirmation')
            ->press('Register')
            ->see('The email has already been taken');
    }

}
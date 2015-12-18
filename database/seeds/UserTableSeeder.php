<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();
        $this->createUser('ericlbarnes', 'eric@ericlbarnes.com');
    }

    protected function createUser($name, $email)
    {
        \App\User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);
    }
}
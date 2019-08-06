<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Nicolas Leal',
            'email' => 'nleal@email.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Sofia D Amore',
            'email' => 'sofia@email.com',
            'password' => bcrypt('password'),
        ]);

    }
}

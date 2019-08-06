<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UsersTableSeeder::class);

        factory(User::class, 10)->create();

        $this->call(ConversationsTableSeeder::class);
        $this->call(MessagesTableSeeder::class);

        

    }
}

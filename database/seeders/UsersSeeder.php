<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
          'name' => 'admin',
          'email' => 'admin@gmail.com',
          'rol' => 1,
          'password' =>  bcrypt('123123123'),
        ]);
        //
        User::create([
          'name' => 'user',
          'email' => 'user@gmail.com',
          'rol' => 0,
          'password' =>  bcrypt('123123123'),
        ]);

        User::create([
          'name' => 'user2',
          'email' => 'user2@gmail.com',
          'rol' => 0,
          'password' =>  bcrypt('123123123'),
        ]);
    }
}

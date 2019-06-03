<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Jack',
            'last_name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '1',
        ]);
        DB::table('users')->insert([
            'first_name' => 'Jack',
            'last_name' => 'Lawyer',
            'email' => 'jack@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'first_name' => 'Michael',
            'last_name' => 'Lawyer',
            'email' => 'michael@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'first_name' => 'Harry',
            'last_name' => 'Lawyer',
            'email' => 'harry@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'first_name' => 'Steve',
            'last_name' => 'Client',
            'email' => 'steve@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '3',
        ]);
        DB::table('users')->insert([
            'first_name' => 'Roger',
            'last_name' => 'Client',
            'email' => 'roger@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '3',
        ]);
        DB::table('users')->insert([
            'first_name' => 'James',
            'last_name' => 'Client',
            'email' => 'james@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '3',
        ]);
    }
}

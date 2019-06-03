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
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'lawyer',
            'email' => 'lawyer@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '2',
        ]);
        DB::table('users')->insert([
            'name' => 'user',
          'email' => 'user@gmail.com',
            'password' => bcrypt('secret'),
            'role_id' => '3',
        ]);
    }
}

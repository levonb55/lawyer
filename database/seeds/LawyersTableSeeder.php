<?php

use Illuminate\Database\Seeder;
use App\Models\Lawyer;

class LawyersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lawyer::create([
            'user_id' => 2,
            'company' => 'Kirkland & Ellis',
            'rating' => 10,
        ]);

        Lawyer::create([
            'user_id' => 3,
            'company' => 'Latham & Watkins',
            'rating' => 11,
        ]);

        Lawyer::create([
            'user_id' => 4,
            'company' => 'Clifford Chance',
            'rating' => 14,
        ]);
    }
}

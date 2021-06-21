<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Place;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // DB::table('places')->insert([
        //    'name' => 'Jakarta',
        //    'visited' => 1,
        //    'date_visited' => now(),
        //    'distance' => 1000
        // ]);
        Place::factory()->count(50)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Http\Controllers\AuthController;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(PlaceSeeder::class);
        $this->call(UserSeeder::class);
    }
}

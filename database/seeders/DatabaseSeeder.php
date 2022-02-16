<?php

namespace Database\Seeders;

use App\Models\Ingredient;
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
        \App\Models\User::factory()->create();
        // $this->call([
        //     TagSeeder::class,
        //     CategorySeeder::class,
        //     IngredientSeeder::class
        // ]);
    }
}
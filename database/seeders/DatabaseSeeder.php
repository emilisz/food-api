<?php

namespace Database\Seeders;

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
        \App\Models\Food::factory(10)->create();
        $this->call([
            IngredientSeeder::class,
        ]);

        $ingredients = \App\Models\Ingredient::all();



        // Populate the pivot table
        \App\Models\Food::all()->each(function ($food) use ($ingredients) {
            $food->ingredients()->attach(
                $ingredients->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}

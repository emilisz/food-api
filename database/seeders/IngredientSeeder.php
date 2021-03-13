<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['title' => 'Olive Oil', 'description' => 'Olive Oil'],
            ['title' => 'Butter', 'description' => 'Butter'],
            ['title' => 'Beef', 'description' => 'Beef'],
            ['title' => 'Plain Flour', 'description' => 'Plain Flour'],
            ['title' => 'Garlic', 'description' => 'Garlic'],
            ['title' => 'Onions', 'description' => 'Onions'],
            ['title' => 'Celery', 'description' => 'Celery'],
            ['title' => 'Carrots', 'description' => 'Carrots'],
            ['title' => 'Water', 'description' => 'Water'],
        ];

        foreach ($items as $item) {
            Ingredient::create($item);
        }
    }
}

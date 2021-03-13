<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Food::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));

        // generate data by accessing properties
        // echo $faker->foodName();

        return [
            'title' => $this->faker->foodName(),
            'description' => $this->faker->sentence,
        ];
    }
}

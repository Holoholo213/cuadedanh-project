<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    public function definition()
    {
        $name = $this->faker->word(2);
        return [
            'name' => $name,
            'slug' => $name
        ];
    }
}
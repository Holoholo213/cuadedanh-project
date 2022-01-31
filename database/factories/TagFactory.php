<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TagFactory extends Factory
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
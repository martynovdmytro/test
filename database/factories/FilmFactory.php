<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(2),
            'status' => $this->faker->boolean(),
            'image' => 'http://via.placeholder.com/640x360'
        ];
    }
}

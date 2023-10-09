<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "rating" => rand(1,5),
            "content" => $this->faker->sentence,
            "book_id" => rand(1,10),
        ];
    }
}

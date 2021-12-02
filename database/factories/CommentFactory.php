<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        return [
            'comment' => $this->faker->text($maxNbChars = 50),
            'uid' => rand(1,100),
            'bid' => rand(1,100),
        ];
    }
}

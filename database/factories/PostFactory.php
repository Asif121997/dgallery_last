<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'post_no' => rand(1,999999),
            'user_id' => 1,
            'title' => $this->faker->sentence(),
            'img' => $this->faker->imageUrl(640,480),
            'description' => $this->faker->text(),
            'address' => $this->faker->text(10),
            'price' => rand(1,40),
            'status' => '1',
        ];
    }
}

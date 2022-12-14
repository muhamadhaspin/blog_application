<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
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
        $title = fake()->sentence();
        return [
            'user_id' => fake()->numberBetween(1, User::count()),
            'category_id' => fake()->numberBetween(1, Category::count()),
            'title' => $title,
            'slug' => str($title)->slug('-'),
            'content' => fake()->realTextBetween(100, 200, 2),
        ];
    }
}

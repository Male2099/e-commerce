<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'user_id' => User::factory(),
            'name' => $this->faker->unique()->name,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'available' => $this->faker->boolean(),
            'onWelcomeList' => $this->faker->boolean(),
            'onSpecial_list' => $this->faker->boolean(),
            'discount' => $this->faker->randomFloat(2, 0, 100),
            'quantity' => $this->faker->numberBetween(1, 100),
            'desc' => $this->faker->text(),
            'title' => $this->faker->title(),
            'special_desc' => $this->faker->title(),
            'imageUrl' => $this->faker->text(),
            'incrediant' => $this->faker->text(),
        ];
    }
}

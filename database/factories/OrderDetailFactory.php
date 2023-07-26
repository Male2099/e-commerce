<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'=>Product::factory(),
            'order_id'=>Order::factory(),
            'subtotal'=>$this->faker->randomFloat(2,0,100),
            'quantity'=>$this->faker->numberBetween(1,59),
        ];
    }
}

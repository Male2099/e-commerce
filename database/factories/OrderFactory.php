<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement(['pending', 'shipping', 'finished']);
        $delivery_method = $this->faker->randomElement(['pickUp', 'delivery']);
        return [
            'user_id' => User::factory(),
            'status' => $status,
            'delivery_method' => $delivery_method,
            'total' => $this->faker->randomFloat(2, 0, 100),
            'cash_receive' => $this->faker->randomFloat(2, 0, 100),
            'promocode' => $this->faker->text(30),
            'order_date' => $this->faker->dateTimeThisDecade(),
        ];
    }
}

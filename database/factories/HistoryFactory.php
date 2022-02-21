<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $userId = $this->faker->numberBetween(1, 5);

        return [
            'user_id' => $userId,
            'associated_id' => $userId + 1 > 5 ? 1 : $userId + 1,
            'type' => $this->faker->randomElement(['buy', 'sell']),
            'currency_crypto' => $this->faker->randomElement(['btc', 'eth', 'xrp', 'doge']),
            'quantity' => $this->faker->numberBetween(1000, 1000000) / 1000000,
            'currency_fiat' => $this->faker->randomElement(['thb', 'usd']),
            'price' => $this->faker->numberBetween(3800000, 4000000) / 100,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Market>
 */
class MarketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 5),
            'wallet_id' => $this->faker->numberBetween(1, 5),
            'type' => $this->faker->randomElement(['buy', 'sell']),
            'currency_fiat' => $this->faker->randomElement(['thb', 'usd']),
            'currency_crypto' => $this->faker->randomElement(['btc', 'eth', 'xrp', 'doge']),
            'price' => $this->faker->numberBetween(3800000, 4000000) / 100,
        ];
    }
}

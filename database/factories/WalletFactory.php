<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $walletUserId = 0;

        return [
            'user_id' => $walletUserId++,
            'thb' => $this->faker->numberBetween(1, 100) * 10000,
            'usd' => $this->faker->numberBetween(1, 100) * 1000,
            'btc' => $this->faker->numberBetween(1, 100) / 100,
            'eth' => $this->faker->numberBetween(1, 100) / 100,
            'xrp' => $this->faker->numberBetween(1, 100) / 100,
            'doge' => $this->faker->numberBetween(1, 100) / 100,
        ];
    }
}

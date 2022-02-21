<?php

namespace Database\Seeders;

use App\Models\History;
use App\Models\Market;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create()->each(function ($user) {
            History::factory()->count(5)->create(['user_id' => $user->id]);
            $wallet = Wallet::factory()->create(['user_id' => $user->id]);
            Market::factory()->count(3)->create(['user_id' => $user->id, 'wallet_id' => $wallet->id]);
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->decimal('thb', 12, 2);
            $table->decimal('usd', 12, 2);
            $table->decimal('btc', 12, 8);
            $table->decimal('eth', 12, 8);
            $table->decimal('xrp', 12, 8);
            $table->decimal('doge', 12, 8);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallets');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id') // кто выводит деньни
                ->constrained('users')
                ->onDelete('restrict');

            $table->decimal('amount', 8, 2); // сколько выводит

            $table->string('destination_card'); // реквизиты

            $table->enum('status', ['pending', 'processing', 'completed', 'failed']) // статус выплаты
                ->default('pending');

            $table->string('payout_provider_id')->nullable(); // системный id транзакции из сервиса массовых выплат

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payouts');
    }
};

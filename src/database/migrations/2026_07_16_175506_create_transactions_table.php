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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->decimal('amount', 8, 2); // сумма которую ввел гость
            $table->decimal('service_fee', 8, 2); // комиссия сервиса
            $table->decimal('payout_amount', 8, 2); // сумма к зачислению

            $table->foreignId('venue_id') // связь с заведением, если заведение удалится, транзакции останутся
                -> constrained('venues')
                -> onDelete('restrict');

            $table->foreignId('user_id') // связь с официантом через таблицу users
                -> constrained('users')
                -> onDelete('restrict');

            $table->enum('status', ['pending', 'paid', 'failed']) // статус платежа, по умолчанию - в обработке
                ->default('pending');

            $table->string('payment_provider');
            $table->string('payment_id')->unique();

            $table->timestamps();

            $table->index('status'); // индексы для удобного поиска в базе
            $table->index('payment_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

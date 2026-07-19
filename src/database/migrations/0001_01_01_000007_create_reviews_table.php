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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('transaction_id') // связка отзыва с транзакцией
                ->constrained('transactions')
                ->onDelete('cascade');

            $table->foreignId('user_id') // связь на официанта
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('venue_id') // связь на заведение
                ->constrained('venues')
                ->onDelete('cascade');

            $table->tinyInteger('rating'); // рейтинг 1-5, tinyint для экономии места в бд

            $table->text('comment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

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
        Schema::create('venue_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venue_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('subscription_plan_id')
                ->constrained('subscription_plans')->
                onDelete('restrict');

            $table->enum('status', ['active', 'trial', 'past_due', 'cancelled', 'expired'])
                ->default('trial');

            $table->timestamp('trial_ends_at')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->string('payment_provider')->nullable();
            $table->string('provider_subscription_id')->nullable();

            $table->timestamps();

            $table->index('status');
            $table->index('ends_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venue_subscriptions');
    }
};

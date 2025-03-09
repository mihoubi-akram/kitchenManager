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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->date('desired_delivery_date')->nullable();
            $table->integer('number');
            $table->decimal('fee_per_weight', 8, 2)->default(0);
            $table->decimal('fee_per_km', 8, 2)->default(0);
            $table->decimal('fee_per_stop', 8, 2)->default(0);
            $table->decimal('fee_per_delivery', 8, 2)->default(0);
            $table->dateTime('delivered_at')->nullable();
            $table->enum('status', ['pending', 'completed', 'cancelled'])->default('pending');
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

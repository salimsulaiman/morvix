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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_model_id')->constrained()->cascadeOnDelete();

            $table->string('license_plate')->unique();
            $table->year('year');
            $table->string('color');

            $table->enum('transmission', ['manual', 'automatic']);
            $table->enum('fuel_type', ['gasoline', 'diesel', 'electric']);

            $table->decimal('fuel_tank_capacity', 5, 1)->nullable();
            $table->decimal('battery_capacity_kwh', 5, 1)->nullable();

            $table->integer('seats')->nullable();
            $table->decimal('daily_price', 12, 2);
            $table->decimal('hourly_price', 12, 2);
            $table->decimal('deposit_amount', 12, 2);

            $table->foreignId('location_id')->constrained()->cascadeOnDelete();
            $table->text('description')->nullable();
            $table->enum('status', ['available', 'rented', 'maintenance'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};

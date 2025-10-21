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
            $table->enum('type', ['car', 'motorcycle']);
            $table->string('brand');
            $table->string('model');
            $table->string('license_plate')->unique();
            $table->year('year');
            $table->string('color');
            $table->enum('transmission', ['manual', 'automatic']);
            $table->enum('fuel_type', ['gasoline', 'diesel', 'electric']);
            $table->integer('seats')->nullable(); // hanya untuk mobil
            $table->decimal('daily_price', 12, 2);
            $table->decimal('hourly_price', 12, 2);
            $table->decimal('deposit_amount', 12, 2);
            $table->text('description')->nullable();
            $table->boolean('is_available')->default(true);
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

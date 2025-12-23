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
        Schema::create('user_sims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('sim_number');
            $table->enum('sim_type', ['A', 'B1', 'B2', 'C', 'C1', 'C2'])->nullable();
            $table->string('sim_photo')->nullable();
            $table->date('expired_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unique(['user_id', 'sim_number']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_sims');
    }
};

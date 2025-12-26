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
        Schema::table('vehicle_models', function (Blueprint $table) {
            $table->foreignId('vehicle_category_id')
                ->nullable()
                ->after('type')
                ->constrained()
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vehicle_models', function (Blueprint $table) {
            $table->dropForeign(['vehicle_category_id']);
            $table->dropColumn('vehicle_category_id');
        });
    }
};

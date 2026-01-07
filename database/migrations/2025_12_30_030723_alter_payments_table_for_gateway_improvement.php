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
        Schema::table('payments', function (Blueprint $table) {

            $table->string('external_id')
                ->nullable()
                ->after('booking_id');

            if (Schema::hasColumn('payments', 'transaction_id')) {
                $table->renameColumn('transaction_id', 'gateway_transaction_id');
            }

            $table->json('gateway_response')
                ->nullable()
                ->after('paid_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            if (Schema::hasColumn('payments', 'gateway_response')) {
                $table->dropColumn('gateway_response');
            }

            if (Schema::hasColumn('payments', 'gateway_transaction_id')) {
                $table->renameColumn('gateway_transaction_id', 'transaction_id');
            }

            if (Schema::hasColumn('payments', 'external_id')) {
                $table->dropColumn('external_id');
            }
        });
    }
};

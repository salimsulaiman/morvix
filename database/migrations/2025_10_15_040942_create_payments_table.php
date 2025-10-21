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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->enum('payment_gateway', ['midtrans', 'xendit', 'tripay', 'manual'])->default('midtrans');
            $table->enum('payment_type', ['full', 'dp', 'refund'])->default('full');
            $table->decimal('amount', 12, 2);
            $table->string('transaction_id')->nullable(); // ID unik dari gateway (misalnya order_id Midtrans)
            $table->enum('status', ['pending', 'paid', 'failed', 'expired', 'refunded'])->default('pending');
            $table->string('payment_url')->nullable(); // URL pembayaran (dari gateway)
            $table->dateTime('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

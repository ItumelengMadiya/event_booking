<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id'); // Links to bookings table
            $table->unsignedBigInteger('user_id'); // Links to users table
            $table->decimal('amount', 10, 2); // Payment amount
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending'); // Status of the payment
            $table->string('payment_method')->nullable(); // Method used for payment (e.g., Stripe, PayPal)
            $table->string('transaction_id')->nullable(); // Transaction ID from the payment gateway
            $table->string('qr_code_path')->nullable(); // Path for storing the QR code
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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

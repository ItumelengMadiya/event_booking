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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->dateTime('date');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('organizer_id');
            $table->integer('max_attendees');
            $table->decimal('ticket_price', 10, 2);
            $table->enum('status', ['upcoming', 'ongoing', 'completed'])->default('upcoming');
            $table->enum('visibility', ['public', 'private'])->default('public');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('organizer_id')->references('id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

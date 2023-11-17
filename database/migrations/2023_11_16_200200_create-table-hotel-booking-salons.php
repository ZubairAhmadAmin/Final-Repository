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
        Schema::create('booking_salons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_bookings_id');
            $table->unsignedBigInteger('hotel_salons_id');
            $table->foreign('hotel_bookings_id')->references('id')->on('hotel_bookings')
            ->onUpdate('cascade')
            ->onDelete('cascade'); 
            $table->foreign('hotel_salons_id')->references('id')->on('hotel_salons')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_salons');
    }
};

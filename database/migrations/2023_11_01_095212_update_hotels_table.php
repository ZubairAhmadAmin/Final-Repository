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
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('email');
            $table->string('mobile_number');
            $table->json('videos')->nullable();
            $table->unsignedInteger('booking_price')->nullable()->change();
            $table->renameColumn('total_solon','total_salons')->nullable()->change();
            $table->unsignedInteger('total_capacity')->nullable()->change();
            $table->renameColumn('hotel_image','hotel_images');

            $table->unsignedBigInteger('hotel_user_id');

            $table->foreign('hotel_user_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            //
        });
    }
};

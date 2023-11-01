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
        Schema::create('hotel_services_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_services_id');
            $table->string('name');
            $table->unsignedInteger('price')->default(0);
            $table->text('description')->nullab();
            $table->json('photos')->nullable();
            $table->unsignedSmallInteger('item_service_type')->nullable();
            $table->timestamps();

            $table->foreign('hotel_services_id')->references('id')->on('hotel_services')
            ->onUpdate('cascade')
            ->onDelete('cascade');        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_services_items');
    }
};

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
        Schema::create('rooms', function (Blueprint $table) {
            $table->string('room_id')->primary();
            $table->string('room_name');
            $table->string('room_building');
            $table->string('room_type');
            $table->string('floor_id');
            $table->string('room_price');

            $table->timestamps();


            $table->foreign('floor_id')->references('floor_id')->on('floors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};

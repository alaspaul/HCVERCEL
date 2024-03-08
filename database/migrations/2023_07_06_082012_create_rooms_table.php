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
            $table->string('room_id', 50)->primary();
            $table->string('room_name', 100);
            $table->string('room_floor', 100);
            $table->string('room_type', 100);
            $table->string('floor_id', 25);
            $table->integer('room_price');
            $table->boolean('isDeleted')->default(false);

            $table->timestamps();


            $table->foreign('floor_id')->references('floor_id')->on('floors')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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

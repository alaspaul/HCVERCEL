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
        Schema::create('patient_assigned_rooms', function (Blueprint $table) {
            $table->string('patAssRoom_id')->primary();
            $table->dateTime('dateAdmitted');
            $table->string('room_id');
            $table->string('patient_id');
            $table->timestamps();

            $table->foreign('patient_id')->references('patient_id')->on('patient_health_records')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('room_id')->references('room_id')->on('rooms')
            ->onDelete('cascade')
            ->onUpdate('cascade');;
        });
    }
       
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_assigned_rooms');
    }
};

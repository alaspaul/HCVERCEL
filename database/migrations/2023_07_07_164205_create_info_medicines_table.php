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
        Schema::create('info_medicines', function (Blueprint $table) {
            $table->string('infomedicine_id')->primary();
            $table->string('medicineFrequency');
            $table->timestamps();

            $table->string('pInfo_id');
            $table->string('medicine_id');

            $table->foreign('pInfo_id')->references('pInfo_id')->on('patient_infos');
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_medicines');
    }
};

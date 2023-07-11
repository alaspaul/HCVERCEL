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
        Schema::create('patient_logs', function (Blueprint $table) {
            $table->string('patientLog_id')->primary();
     
            $table->timestamps(); 

            $table->string('pInfo_id');
            $table->string('patient_id');

            $table->foreign('pInfo_id')->references('pInfo_id')->on('patient_infos');
            $table->foreign('patient_id')->references('patient_id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_logs');
    }
};

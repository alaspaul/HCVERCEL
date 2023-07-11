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
        Schema::create('patient_histories', function (Blueprint $table) {
            $table->string('patientHistory_id')->primary();
     
            $table->timestamps(); 

            $table->string('patientLog_id');
            $table->string('patient_id');

            $table->foreign('patientLog_id')->references('patientLog_id')->on('patient_logs');
        });
    }

    /**    
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_histories');
    }
};

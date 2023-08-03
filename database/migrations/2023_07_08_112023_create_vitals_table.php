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
        Schema::create('vitals', function (Blueprint $table) {
            $table->string('patientVitals_id')->primary();
            $table->string('patientVitals_Bp');
            $table->string('patientVitals_temp');
            $table->string('patientVitals_pulseRate');
            $table->string('patientVitals_breathingRate');

            $table->timestamps(); 

            $table->string('patient_id');
           
            $table->foreign('patient_id')->references('patient_id')->on('patient_health_records')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitals');
    }
};

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
        Schema::create('patient_medicines', function (Blueprint $table) {
            $table->string('patientMedicine_id', 75)->primary();
            $table->datetime('patientMedicineDate');
            $table->string('medicine_frequency', 255);
            $table->string('medicine_id',25);
            $table->string('patient_id', 25);
            $table->boolean('isDeleted')->default(false);
            $table->timestamps();

            $table->foreign('patient_id')->references('patient_id')->on('patients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('medicine_id')->references('medicine_id')->on('medicines')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_medicines');
    }
};

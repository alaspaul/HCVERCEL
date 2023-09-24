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
        Schema::create('physical_exam_values', function (Blueprint $table) {
            $table->string('PAV_id')->primary();
            $table->string('PAV_value', 1000);

            $table->timestamps();

            $table->string('PEA_id');
            $table->string('patient_id');

            $table->foreign('PEA_id')->references('PEA_id')->on('physical_exam_attributes')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            
            $table->foreign('patient_id')->references('patient_id')->on('patients')
            ->onDelete('cascade')
            ->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_exam_values');
    }
};

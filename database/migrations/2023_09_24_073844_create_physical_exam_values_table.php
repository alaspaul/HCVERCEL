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
            $table->string('PAV_id', 100)->primary();
            $table->string('PAV_value', 100);

            $table->timestamps();

            $table->string('PEA_id', 50);
            $table->string('patient_id', 25);

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

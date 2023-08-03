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
        Schema::create('lab_results', function (Blueprint $table) {
            $table->string('labResults_id')->primary();
            $table->dateTime('labResultDate');
            $table->string('results', 1000);
            $table->string('patient_id');
            $table->timestamps();

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
        Schema::dropIfExists('lab_results');
    }
};

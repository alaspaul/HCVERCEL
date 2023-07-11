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
        Schema::create('info_medecines', function (Blueprint $table) {
            $table->string('infoMedecine_id')->primary();
            $table->string('medecineFrequency');
            $table->timestamps();

            $table->string('pInfo_id');
            $table->string('medecine_id');

            $table->foreign('pInfo_id')->references('pInfo_id')->on('patient_infos');
            $table->foreign('medecine_id')->references('medecine_id')->on('medecines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_medecines');
    }
};

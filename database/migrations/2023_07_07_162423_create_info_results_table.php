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
        Schema::create('info_results', function (Blueprint $table) {
            $table->string('pInfo_id');
            $table->string('result_id');



            $table->timestamps();

            
            $table->foreign('pInfo_id')->references('pInfo_id')->on('patient_infos');
            $table->foreign('result_id')->references('result_id')->on('results');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_results');
    }
};

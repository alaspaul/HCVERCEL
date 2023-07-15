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
        Schema::create('info_histories', function (Blueprint $table) {
            $table->string('infoHistory_id')->primary();
            $table->string('pInfo_id');
            $table->string('history_id');
            $table->timestamps();

            $table->foreign('pInfo_id')->references('pInfo_id')->on('patient_infos');
            $table->foreign('history_id')->references('history_id')->on('histories');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_histories');
    }
};

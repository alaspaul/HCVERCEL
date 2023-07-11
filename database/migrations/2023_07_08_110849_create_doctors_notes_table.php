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
        Schema::create('doctors_notes', function (Blueprint $table) {
            $table->string('docNotes_id')->primary();
            $table->string('notes');
     
            $table->timestamps(); 

            $table->string('pInfo_id');
            $table->string('resident_id');

            $table->foreign('pInfo_id')->references('pInfo_id')->on('patient_infos');
            $table->foreign('resident_id')->references('resident_id')->on('residents');
        });
    }
 
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors_notes');
    }
};

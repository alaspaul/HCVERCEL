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
        Schema::create('patients', function (Blueprint $table) {
            $table->string('patient_id',25)->primary();
            $table->string('patient_fName',100);
            $table->string('patient_lName',100);
            $table->string('patient_mName',100);
            $table->integer('patient_age');
            $table->string('patient_sex',25);
            $table->boolean('isDeleted')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

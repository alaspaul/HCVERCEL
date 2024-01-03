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
        Schema::create('physical_exam_attributes', function (Blueprint $table) {
            $table->string('PEA_id')->primary();
            $table->string('PEA_name');
            $table->string('PEA_dataType');

            $table->timestamps();
            $table->string('physicalExam_id');

            $table->foreign('physicalExam_id')->references('physicalExam_id')->on('physical_exam_categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('physical_exam__attributes');
    }
};

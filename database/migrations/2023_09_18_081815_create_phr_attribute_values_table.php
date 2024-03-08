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
        Schema::create('phr_attribute_values', function (Blueprint $table) {
            $table->string('attributeVal_id', 100)->primary();
            $table->string('attributeVal_values', 100);

            $table->string('patient_id', 25);
            $table->string('categoryAtt_id', 50);

            $table->foreign('patient_id')->references('patient_id')->on('patients')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('categoryAtt_id')->references('categoryAtt_id')->on('phr_category_attributes')
            ->onDelete('cascade')
            ->onUpdate('cascade');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phr_attribute_values');
    }
};

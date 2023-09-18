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
        Schema::create('phr_category_attributes', function (Blueprint $table) {
            $table->string('categoryAtt_id')->primary();
            $table->string('categoryAtt_name');
            $table->string('categoryAtt_dataType');

            $table->string('formCat_id');

            $table->foreign('formCat_id')->references('formCat_id')->on('phr_form_categories')
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
        Schema::dropIfExists('phr_category_attributes');
    }
};

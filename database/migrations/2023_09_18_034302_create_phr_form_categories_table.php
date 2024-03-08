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
        Schema::create('phr_form_categories', function (Blueprint $table) {
            $table->string('formCat_id', 25)->primary();
            $table->string('formCat_name', 100);
            $table->string('formCat_description', 250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phr_form_categories');
    }
};

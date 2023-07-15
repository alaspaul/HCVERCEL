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
        Schema::create('medicines', function (Blueprint $table) {
            $table->string('medicine_id')->primary();
            $table->string('medicine_name');
            $table->string('medicine_brand');
            $table->string('medicine_dosage');
            $table->string('medicine_type');
            $table->string('medicine_price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicines');
    }
};

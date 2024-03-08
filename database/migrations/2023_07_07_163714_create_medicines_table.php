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
            $table->string('medicine_id', 25)->primary();
            $table->string('medicine_name');
            $table->string('medicine_brand', 100);
            $table->string('medicine_dosage', 100);
            $table->string('medicine_type', 100);
            $table->string('medicine_price', 100);
            $table->boolean('isDeleted')->default(false);

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

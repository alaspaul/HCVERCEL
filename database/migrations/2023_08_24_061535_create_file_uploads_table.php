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
        Schema::create('file_uploads', function (Blueprint $table) {
            $table->string('file_id', 100)->primary();
            $table->string('file_path', 255);
            $table->string('file_name', 255)->unique();
            $table->string('file_size', 100);
            $table->string('file_ext', 50);

            $table->string('patient_id', 25);
            $table->string('resident_id', 50);

            $table->foreign('patient_id')->references('patient_id')->on('patients')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('resident_id')->references('resident_id')->on('residents')
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
        Schema::dropIfExists('file_uploads');
    }
};

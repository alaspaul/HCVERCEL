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
        Schema::create('res_action_logs', function (Blueprint $table) {
            $table->string('RA_id', 75)->primary();
            $table->string('action',1000);
            $table->string('role', 100);
            $table->timestamps();


            $table->string('user_id', 25);
            $table->foreign('user_id')->references('resident_id')->on('residents')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('res_action_logs');
    }
};

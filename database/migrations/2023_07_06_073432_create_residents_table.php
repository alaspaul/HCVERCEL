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
        Schema::create('residents', function (Blueprint $table) {
            $table->string('resident_id',50)->primary();
            $table->string('resident_userName', 100)->unique();
            $table->string('resident_fName', 100);
            $table->string('resident_lName', 100);
            $table->string('resident_mName', 100);
            $table->string('resident_gender', 25);
            $table->string('resident_password', 255);
            $table->string('role', 25);
            $table->rememberToken();
            $table->string('department_id', 25);
            
            $table->timestamps();

            $table->foreign('department_id')->references('department_id')->on('departments')     
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });


 
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};

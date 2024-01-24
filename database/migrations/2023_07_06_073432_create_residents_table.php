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
            $table->string('resident_id')->primary();
            $table->string('resident_userName')->unique();
            $table->string('resident_fName');
            $table->string('resident_lName');
            $table->string('resident_mName');
            $table->string('resident_gender');
            $table->string('resident_password');
            $table->string('role');
            $table->rememberToken();
            $table->string('department_id');
            
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

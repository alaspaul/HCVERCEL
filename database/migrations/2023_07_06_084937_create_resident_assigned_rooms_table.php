<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\resident;
use App\Models\room;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('resident_assigned_rooms', function (Blueprint $table) {
            
            $table->string('resAssRoom_id')->primary();
            
            $table->string('room_id');
            $table->string('resident_id');
            $table->boolean('isFinished');
            $table->timestamps();
            
            $table->foreign('room_id')->references('room_id')->on('rooms');
            $table->foreign('resident_id')->references('resident_id')->on('residents');
           
        });



        
  
                 



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resident_assigned_rooms');
    }
};

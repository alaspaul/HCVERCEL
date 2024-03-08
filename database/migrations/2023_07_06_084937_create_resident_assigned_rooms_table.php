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
            
            $table->string('resAssRoom_id',125)->primary();
            
            $table->string('room_id', 50);
            $table->string('resident_id', 50);
            $table->boolean('isFinished')->default(false);
            $table->boolean('isDeleted')->default(false);
            $table->timestamps();
            
            $table->foreign('room_id')->references('room_id')->on('rooms')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('resident_id')->references('resident_id')->on('residents')
            ->onDelete('cascade')
            ->onUpdate('cascade');;
           
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

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
        Schema::create('chat_group_messages', function (Blueprint $table) {
            $table->string('chatGroupMessages_id', 75)->primary();
            $table->string('message', 255);

            $table->timestamps();

            $table->string('chatGroup_id', 25);
            $table->foreign('chatGroup_id')->references('chatGroup_id')->on('chat_groups')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('resident_id', 25);
            $table->foreign('resident_id')->references('resident_id')->on('residents')
            ->onDelete('cascade')
            ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_group_messages');
    }
};

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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Scout ID
            $table->unsignedBigInteger('event_id');
            $table->timestamps();

         // Define foreign key constraints
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('event_id')->references('id')->on('events');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};

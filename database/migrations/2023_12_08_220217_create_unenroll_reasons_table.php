<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnenrollReasonsTable extends Migration
{
    public function up()
    {
        Schema::create('unenroll_reasons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('event_id')->constrained();
            $table->text('unenroll_reason')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unenroll_reasons');
    }
};

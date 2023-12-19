<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->text('unenroll_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropColumn('unenroll_reason');
        });
    }
};

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
    Schema::table('cursos', function (Blueprint $table) {
        $table->unsignedBigInteger('instructor_id')->nullable();
        $table->foreign('instructor_id')->references('id')->on('instructores');
    });
}

public function down()
{
    Schema::table('cursos', function (Blueprint $table) {
        $table->dropColumn('instructor_id');
    });
}
};

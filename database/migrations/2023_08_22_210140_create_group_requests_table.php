<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id_req');
            $table->foreign('student_id_req')->references('id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('student_id_requested');
            $table->foreign('student_id_requested')->references('id')->on('students')->onDelete('cascade');
            $table->integer('group_id');
            $table->foreign('group_id')->references('group_id')->on('group_data')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_requests');
    }
};

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
        Schema::create('sub_phases', function (Blueprint $table) {
            $table->id();
            $table->string('subphase_name');
            $table->unsignedBigInteger('phase_id');
            $table->foreign('phase_id')->references('id')->on('phases')->onDelete('cascade');
            $table->integer('allow_status')->default(0);
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
        Schema::dropIfExists('sub_phases');
    }
};

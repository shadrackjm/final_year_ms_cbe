




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
        Schema::create('project_titles', function (Blueprint $table) {
            $table->id();
            $table->integer('group_id');
            $table->foreign('group_id')->references('g_id')->on('groups')->onDelete('cascade');
            $table->string('title')->unique();
            $table->integer('title_status')->default(0);
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('project_titles');
    }
};

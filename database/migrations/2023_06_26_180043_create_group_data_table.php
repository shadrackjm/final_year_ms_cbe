
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
        Schema::create('group_data', function (Blueprint $table) {
            $table->id();
            $table->string('regno')->unique();
            $table->foreign('regno')->references('regno')->on('students')->onDelete('cascade');
            $table->integer('group_id');
            $table->foreign('group_id')->references('g_id')->on('groups')->onDelete('cascade');
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
        Schema::dropIfExists('group_data');
    }
};

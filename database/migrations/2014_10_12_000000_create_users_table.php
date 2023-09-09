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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('fname');
            $table->string('Mname')->nullable();
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('is_admin')->default(0);
            $table->timestamp('last_login');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('login_status')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
            $table->string('name', 64);
            $table->string('username', 32)->unique()->nullable();
            $table->string('email', 128)->unique()->nullable();
            $table->string('mobile', 16)->unique()->nullable();
            $table->string('password', 64);
            $table->boolean('is_admin')->default(false);
            $table->boolean('disabled')->default(true);
            $table->text('description');
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
}

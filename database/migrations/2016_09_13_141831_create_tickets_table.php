<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('name', 80);
            $table->string('email', 50);
            $table->string('title');
            $table->timestamp('created_at');
            $table->string('tracking_code', 30);
            $table->integer('department_id');
            $table->enum('priority', ['low', 'medium', 'high']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tickets');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title', 128);
            $table->text('summery')->nullable();
            $table->text('body');
            $table->string('meta_description', 512)->nullable();
            $table->string('keywords', 512)->nullable();
            $table->unsignedInteger('comment_count')->default(0);
            $table->unsignedInteger('visit_count')->default(0);
            $table->string('slug', 500);
            $table->timestamps();
            $table->timestamp('published_at')->nullable();
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
        Schema::drop('posts');
    }
}

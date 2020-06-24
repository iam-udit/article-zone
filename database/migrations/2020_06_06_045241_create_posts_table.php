<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->unsignedBigInteger('user_id');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('quote', 255);
            $table->longText('body');
            $table->string('image')->default('default.jpg');
            $table->unsignedInteger('view_count')->default(0);
            $table->boolean('is_published')->default(false);
            $table->boolean('is_approved')->default(false);
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('posts');
    }
}

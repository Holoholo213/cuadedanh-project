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
            $table->string("title");
            $table->unsignedBigInteger("category_id");
            $table->string("slug");
            $table->string("description");
            $table->string("thumb_img")->nullable();
            $table->boolean("publish")->default(false);
            $table->boolean("favorite")->default(false);
            $table->longText("content")->nullable();
            $table->timestamp("published_at")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign("category_id")->references("id")->on("categories")->cascadeOnDelete();
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
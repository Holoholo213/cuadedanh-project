<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_ingredient', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("post_id");
            $table->foreign("post_id")->references("id")->on("posts")->cascadeOnDelete();
            $table->unsignedBigInteger("ingredient_id");
            $table->foreign("ingredient_id")->references("id")->on("ingredients")->cascadeOnUpdate();
            $table->string("values");
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
        Schema::dropIfExists('post_ingredient');
    }
}
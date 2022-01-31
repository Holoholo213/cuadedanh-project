<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("post_id");
            $table->text("description")->nullable();
            $table->string("image_dir");
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('sub_contents', function (Blueprint $table) {
            $table->foreign("post_id")->references("id")->on("posts")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_contents');
    }
}
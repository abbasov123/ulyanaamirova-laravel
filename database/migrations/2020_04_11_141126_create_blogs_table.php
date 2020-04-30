<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->string("blog_img")->nullable();
            // $table->string("blog_img")->default("default.jpg");
            $table->string("title");
            $table->string("genre")->nullable();
            $table->text("description")->nullable();
            $table->json("blog_imgs");
            $table->text("story");
            $table->integer("views")->default(0);

       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}

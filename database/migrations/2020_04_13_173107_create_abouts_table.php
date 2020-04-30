<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //$table->string("profile_img")->nullable();
            $table->string("name")->default("Ulyana Amirova");
            $table->text("about")->default("The future famous writer");
            $table->string("email")->default("example@gmail.com");
            $table->string("profile_img")->default("default.jpg");

            $table->string("inst")->default("https://www.instagram.com/amirovaulyana/");
            $table->string("vk")->default("https://vk.com/take_me_to_churchh");
            $table->string("litnet")->default("https://litnet.com/ru/ulyanaamirova-u3210800");


            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {

            $table->id();
            $table->timestamps();

            $table->string("book_name");
            $table->string("genre")->nullable();
            $table->text("description")->nullable();

            $table->string("book_img")->default("default.jpg");

            $table->json("headings");
            $table->json("stories");


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
        Schema::dropIfExists('books');
    }
}

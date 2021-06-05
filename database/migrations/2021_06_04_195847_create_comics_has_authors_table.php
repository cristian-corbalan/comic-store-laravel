<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsHasAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics_has_authors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comic_id');
            $table->unsignedBigInteger('author_id');
            $table->timestamps();

            $table->foreign('comic_id')->references('id')->on('comics')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics_has_authors');
    }
}

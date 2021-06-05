<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsHasGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics_has_genres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comic_id');
            $table->unsignedTinyInteger('genre_id');
            $table->timestamps();

            $table->foreign('comic_id')->references('id')->on('comics')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genres')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics_has_genres');
    }
}

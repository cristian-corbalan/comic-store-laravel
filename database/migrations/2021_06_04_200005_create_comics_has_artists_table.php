<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsHasArtistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics_has_artists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('comic_id');
            $table->unsignedBigInteger('artist_id');
            $table->timestamps();

            $table->foreign('comic_id')->references('id')->on('comics')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('artist_id')->references('id')->on('artists')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics_has_artists');
    }
}

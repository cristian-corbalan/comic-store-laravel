<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('synopsis')->unique();
            $table->unsignedSmallInteger('number_pages')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedTinyInteger('discount');
            $table->unsignedInteger('stock');
            $table->date('publication_date');
            $table->unsignedBigInteger('cover_img_id')->nullable()->default(2);
            $table->unsignedTinyInteger('brand_id')->nullable()->default(1);
            $table->timestamps();

            $table->foreign('cover_img_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comics');
    }
}

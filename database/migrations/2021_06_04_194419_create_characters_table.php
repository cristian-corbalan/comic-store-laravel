<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name',45)->unique();
            $table->string('alias',45)->nullable();
            $table->text('description');
            $table->unsignedBigInteger('profile_img_id')->default(4);
            $table->timestamps();

            $table->foreign('profile_img_id')->references('id')->on('images')->onUpdate('cascade')->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("section_id")->nullable();
            $table->string("icon")->nullable();
            $table->string("image")->nullable();
            $table->string("title")->nullable();
            $table->longText("description")->nullable();
            $table->longText("content")->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('SET NULL');
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
        Schema::dropIfExists('publications');
    }
};

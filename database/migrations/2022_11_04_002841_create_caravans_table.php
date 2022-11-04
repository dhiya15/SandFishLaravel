<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaravansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caravans', function (Blueprint $table) {
            $table->id();
            $table->string("student_full_name")->nullable();
            $table->date("student_birth_date")->nullable();
            $table->string("parent_full_name")->nullable();
            $table->string("parent_email")->nullable();
            $table->string("parent_phone_number")->nullable();
            $table->string("student_photo")->nullable();
            $table->string("student_birth_certificate")->nullable();
            $table->string("is_accepted")->nullable();
            $table->enum("student_category", ["Category N°01", "Category N°02", "Category N°03"])->nullable();
            $table->enum("student_state", ["Béchar", "Beni Abbes", "El Ouata", "Kerzaz"])->nullable();
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
        Schema::dropIfExists('caravans');
    }
}

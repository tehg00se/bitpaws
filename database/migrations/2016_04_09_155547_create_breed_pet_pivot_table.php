<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBreedPetPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breed_pet', function (Blueprint $table) {
            $table->integer('breed_id')->unsigned()->index();
            $table->foreign('breed_id')->references('id')->on('breed')->onDelete('cascade');
            $table->integer('pet_id')->unsigned()->index();
            $table->foreign('pet_id')->references('id')->on('pet')->onDelete('cascade');
            $table->primary(['breed_id', 'pet_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('breed_pet');
    }
}

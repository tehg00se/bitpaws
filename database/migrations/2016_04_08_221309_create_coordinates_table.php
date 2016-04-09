<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUserProfileTable
 */
class CreateCoordinatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->decimal('latitude', 18, 12);
            $table->decimal('longitude', 18, 12);
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coordinates');
    }
}

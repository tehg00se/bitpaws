<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUserProfileTable
 */
class CreateBreedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('species_id')->unsigned();
            $table->string('breed_slug');
            $table->string('breed_name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('species_id')
                ->references('id')->on('species')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('breeds', function (Blueprint $table) {
            $table->dropForeign('breeds_species_id_foreign');
        });
        Schema::drop('breeds');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUserProfileTable
 */
class CreateUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name_first');
            $table->string('name_last');
            $table->text('hobbies');
            $table->text('interests');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->dropForeign('profiles_user_id_foreign');
        });
        Schema::drop('profiles');
    }
}

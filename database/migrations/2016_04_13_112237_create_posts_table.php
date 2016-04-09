<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pet_id')->unsigned();
            $table->string('post_title');
            $table->string('post_content');
            $table->decimal('latitude', 18, 12);
            $table->decimal('longitude', 18, 12);
            $table->integer('pet_status');
            $table->timestamps();
            $table->softDeletes();

            $table->index('id');

            $table->foreign('pet_id')
                ->references('id')->on('pets')
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign('posts_pet_id_foreign');
        });
        Schema::drop('posts');
    }
}

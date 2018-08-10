<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMatematika extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matematikas', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('topic_id')->unsigned()->nullable();
    $table->foreign('topic_id', 'fk_256_topic_topic_id_math')->references('id')->on('topics');
    $table->integer('user_id')->unsigned()->nullable();
    $table->foreign('user_id', 'fk_256_topic_user_id_math')->references('id')->on('users');

    $table->string('title')->nullable();
    $table->integer('time')->nullable();
    $table->text('description')->nullable();
    $table->timestamps();
    $table->softDeletes();

    $table->index(['deleted_at']);
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matematikas');

    }
}

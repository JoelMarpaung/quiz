<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizMatematikaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_matematikas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_257_user_id_quiz_math')->references('id')->on('users');
            $table->integer('matematika_id')->unsigned()->nullable();
            $table->foreign('matematika_id', 'fk_258_math_id_math')->references('id')->on('matematikas');
            $table->string('total_correct')->nullable();
            $table->string('score')->nullable();
            $table->string('result')->nullable();
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
        Schema::dropIfExists('quiz_matematikas');
    }
}

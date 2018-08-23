<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizMatematikaAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_matematika_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id', 'fk_259_user_id_quiz_math')->references('id')->on('users');
            $table->integer('matematika_id')->unsigned()->nullable();
            $table->foreign('matematika_id', 'fk_260_math_id_math')->references('id')->on('matematikas');
            $table->integer('quiz_id')->unsigned()->nullable();
            $table->foreign('quiz_id', 'fk_261_quiz_id_quiz_math')->references('id')->on('quiz_matematikas');
            $table->integer('question_id')->unsigned()->nullable();
            $table->foreign('question_id', 'fk_262_question_id_quiz_math')->references('id')->on('matematika_questions');
            $table->integer('correct')->unsigned()->default(0);
            $table->integer('score')->unsigned()->default(0);
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
        Schema::dropIfExists('quiz_matematika_answers');
    }
}

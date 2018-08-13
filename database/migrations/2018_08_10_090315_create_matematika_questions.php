<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatematikaQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matematika_questions', function (Blueprint $table) {
    $table->increments('id');
    $table->integer('matematika_id')->unsigned()->nullable();
    $table->foreign('matematika_id', 'fk_258_topic_matematika_id_matematika')->references('id')->on('matematikas');
    $table->text('question')->nullable();
    $table->integer('point')->unsigned()->nullable();
    $table->text('option_a')->nullable();
    $table->text('option_b')->nullable();
    $table->text('option_c')->nullable();
    $table->text('option_d')->nullable();
    $table->text('option_e')->nullable();
    $table->string('correct')->nullable();

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
        Schema::dropIfExists('matematika_questions');
    }
}

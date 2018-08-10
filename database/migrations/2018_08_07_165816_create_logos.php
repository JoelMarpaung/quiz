<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogos extends Migration
{
    public function up()
    {
        Schema::create('Logo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question_id')->nullable();
            $table->string('option')->nullable();
            $table->string('picture')->nullable();
            
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
        Schema::dropIfExists('Logo');
    }
}

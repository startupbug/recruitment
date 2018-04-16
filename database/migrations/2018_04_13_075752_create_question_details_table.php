<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();            
            $table->integer('tag_id')->unsigned();            
            $table->string('media')->nullable();
            $table->string('marks')->nullable();
            $table->string('negative_marks')->nullable();
            $table->string('provider')->nullable();
            $table->string('author')->nullable();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('tag_id')->references('id')->on('question_tags')->onDelete('cascade')->onUpdate('cascade'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_details');
    }
}

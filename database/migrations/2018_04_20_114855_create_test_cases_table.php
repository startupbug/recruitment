<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_cases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->string('test_case_name')->nullable();
            $table->string('test_case_input')->nullable();
            $table->string('test_case_output')->nullable();
            $table->string('weightage')->nullable();
            $table->string('test_case_file')->nullable();
            $table->tinyInteger('weightage_status')->nullable()->default('0');
            $table->tinyInteger('test_case_verify')->nullable()->default('0');            
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade')->onUpdate('cascade'); 
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
        Schema::dropIfExists('test_cases');
    }
}

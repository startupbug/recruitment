<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMulitpleChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mulitple_choices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();            
            $table->string('choice')->nullable();            
            $table->string('partial_marks')->nullable();            
            $table->tinyInteger('status')->nullable()->default('0');            
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
        Schema::dropIfExists('mulitple_choices');
    }
}

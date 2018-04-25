<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostedTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosted_tests', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('host_name');
            $table->integer('test_template_id')->unsigned();
            $table->string('cut_off_marks')->nullable();
            $table->date('test_open_date')->nullable();
            $table->time('test_open_time')->nullable();            
            $table->date('test_close_date')->nullable();
            $table->time('test_close_time')->nullable();
            $table->string('time_zone')->nullable();

            $table->foreign('test_template_id')->references('id')->on('test_templates')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hosted_tests');
    }
}

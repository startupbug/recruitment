<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateWorkSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_work_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('candidate_work_infos_id')->unsigned();            
            $table->foreign('candidate_work_infos_id')->references('id')->on('candidate_work_infos')->onDelete('cascade')->onUpdate('cascade');
            $table->string('skill')->nullable();
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
        Schema::dropIfExists('candidate_work_skills');
    }
}

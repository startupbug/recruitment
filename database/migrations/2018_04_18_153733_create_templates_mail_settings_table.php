<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesMailSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates_mail_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_templates_id')->unsigned();
            $table->string('receiver_email')->nullable();
            $table->string('percentage_required')->nullable();
            $table->tinyInteger('include_questionnaire')->nullable()->default('0');
            $table->tinyInteger('candidate_mail_setting')->nullable()->default('0');
            $table->longText('mail_template_message')->nullable();            
            $table->foreign('test_templates_id')->references('id')->on('test_templates')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('templates_mail_settings');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesTestSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates_test_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_templates_id')->unsigned();
            $table->integer('test_template_types_id')->unsigned();
            $table->integer('webcam_id')->unsigned();
            $table->tinyInteger('request_resume')->nullable()->default('0');
            $table->tinyInteger('mandatory_resume')->nullable()->default('0');
            $table->tinyInteger('email_verification')->nullable()->default('0');
            $table->foreign('test_template_types_id')->references('id')->on('test_template_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('test_templates_id')->references('id')->on('test_templates')->onDelete('cascade')->onUpdate('cascade'); 
            $table->foreign('webcam_id')->references('id')->on('webcams')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('templates_test_settings');
    }
}

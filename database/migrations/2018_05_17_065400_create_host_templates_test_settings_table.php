<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHostTemplatesTestSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_templates_test_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('host_id')->unsigned();
            $table->integer('webcam_id')->unsigned();
            $table->tinyInteger('request_resume')->nullable()->default('0');
            $table->tinyInteger('mandatory_resume')->nullable()->default('0');
            $table->tinyInteger('email_verification')->nullable()->default('0');
            $table->foreign('host_id')->references('id')->on('hosted_tests')->onDelete('cascade')->onUpdate('cascade'); 
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
        Schema::dropIfExists('host_templates_test_settings');
    }
}

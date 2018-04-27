<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplateSettingMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template_setting_messages', function (Blueprint $table) {
            $table->increments('id');  
            $table->integer('test_templates_id')->unsigned();
            $table->longText('setting_message')->nullable(); 
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
        Schema::dropIfExists('template_setting_messages');
    }
}

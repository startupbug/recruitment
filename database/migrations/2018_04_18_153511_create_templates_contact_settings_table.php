<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemplatesContactSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates_contact_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('test_templates_id')->unsigned();
            $table->tinyInteger('email_visible')->nullable()->default('0');
            $table->tinyInteger('contact_visible')->nullable()->default('0');
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
        Schema::dropIfExists('templates_contact_settings');
    }
}

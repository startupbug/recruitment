<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicPageViewDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        Schema::create('public_page_view_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('template_id')->unsigned();
            $table->integer('cover_tag_id')->unsigned();
            $table->string('image');
            $table->timestamps();
        });

        Schema::table('public_page_view_details', function($table) {
            $table->foreign('template_id')->references('id')->on('test_templates');
            $table->foreign('cover_tag_id')->references('id')->on('cover_image_tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_page_view_details');
    }
}

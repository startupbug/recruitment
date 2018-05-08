<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTemplateIdToCoverImageTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cover_image_tags', function (Blueprint $table) {
            $table->integer('template_id')->unsigned()->after('id');
            $table->foreign('template_id')->references('id')->on('test_templates')->onDelete('cascade')->onUpdate('cascade'); 
                    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cover_image_tags', function (Blueprint $table) {
             $table->dropColumn('template_id');
        });
    }
}

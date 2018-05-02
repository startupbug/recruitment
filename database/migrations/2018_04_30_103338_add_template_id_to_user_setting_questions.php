<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTemplateIdToUserSettingQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_setting_questions', function (Blueprint $table) {
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
        Schema::table('user_setting_questions', function (Blueprint $table) {
            $table->dropColumn('template_id');
        });
    }
}

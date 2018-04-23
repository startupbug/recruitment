<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToFormatTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('format_types', function (Blueprint $table) {
            $table->integer('format_setting_id')->unsigned()->after('id');
             $table->foreign('format_setting_id')->references('id')->on('format_settings')->onDelete('cascade');
             $table->integer('admin_setting_question_id')->unsigned()->after('id');
             $table->foreign('admin_setting_question_id')->references('id')->on('admin_setting_questions')->onDelete('cascade');
             $table->integer('user_setting_question_id')->unsigned()->after('id');
             $table->foreign('user_setting_question_id')->references('id')->on('user_setting_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('format_types', function (Blueprint $table) {
           $table->dropColumn('format_setting_id');
          $table->dropColumn('admin_setting_question_id');
           $table->dropColumn('user_setting_question_id');
        });
    }
}

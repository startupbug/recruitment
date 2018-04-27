<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdminQuestionTypeIdToAdminSettingQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_setting_questions', function (Blueprint $table) {
            $table->integer('admin_question_type_id')->unsigned()->after('user_id');            
            $table->foreign('admin_question_type_id')->references('id')->on('admin_question_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_setting_questions', function (Blueprint $table) {
           $table->dropColumn('admin_question_type_id');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToQuestionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_details', function (Blueprint $table) {
        $table->tinyInteger('weightage_status')->nullable()->default('0')->after('media');
        $table->tinyInteger('test_case_verify')->nullable()->default('0')->after('media');
        $table->string('test_case_file')->nullable()->after('media');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_details', function (Blueprint $table) {
             $table->dropColumn('weightage_status');
             $table->dropColumn('test_case_verify');
             $table->dropColumn('test_case_file');
        });
    }
}

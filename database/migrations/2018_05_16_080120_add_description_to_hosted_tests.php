<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToHostedTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hosted_tests', function (Blueprint $table) {
            $table->string('description')->after('test_template_id');
            $table->string('instruction')->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hosted_tests', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('instruction');   
        });
    }
}

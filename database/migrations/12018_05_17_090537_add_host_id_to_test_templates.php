<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHostIdToTestTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_templates', function (Blueprint $table) {
            
            $table->integer('host_id')->after('duration')->unsigned();
            $table->integer('hosted')->after('host_id');
            $table->foreign('host_id')->references('id')->on('hosted_tests')->onDelete('cascade')->onUpdate('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('test_templates', function($table) {
            $table->dropColumn('host_id');
            $table->dropColumn('hosted');
        });
    }
}

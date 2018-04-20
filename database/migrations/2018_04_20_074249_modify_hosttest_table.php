<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyHosttestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('hosted_tests', function($table) {
                $table->integer('status')->unsigned()->default(1);
                $table->foreign('status')->references('id')->on('test_statuses')->onDelete('cascade')->onUpdate('cascade');                
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('hosted_tests', function($table) {
            $table->dropColumn('status');
        });
    }
}

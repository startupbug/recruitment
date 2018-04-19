<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyCreateHostedTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hosted_tests', function (Blueprint $table) {
            $table->dateTime('test_open_date')->change();
            $table->dateTime('test_close_date')->change();

            $table->string('test_open_time')->change();
            $table->string('test_close_time')->change();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

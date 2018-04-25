<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToMultipleChoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mulitple_choices', function (Blueprint $table) {
             $table->tinyInteger('shuffle_status')->nullable()->default('0')->after('status'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mulitple_choices', function (Blueprint $table) {
             $table->dropColumn('shuffle_status');
        });
    }
}

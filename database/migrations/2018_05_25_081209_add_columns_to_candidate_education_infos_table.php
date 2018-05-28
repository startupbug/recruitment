<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCandidateEducationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate_education_infos', function (Blueprint $table) {
            $table->longText('description')->nullable()->after('current_status'); 
            $table->string('order_number')->nullable()->after('current_status'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('candidate_education_infos', function (Blueprint $table) {
           $table->dropColumn('order_number');
           $table->dropColumn('description');
        });
    }
}

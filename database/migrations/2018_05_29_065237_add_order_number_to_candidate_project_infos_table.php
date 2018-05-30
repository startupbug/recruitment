<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderNumberToCandidateProjectInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('candidate_project_infos', function (Blueprint $table) {
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
        Schema::table('candidate_project_infos', function (Blueprint $table) {
           $table->dropColumn('order_number');
        });
    }
}

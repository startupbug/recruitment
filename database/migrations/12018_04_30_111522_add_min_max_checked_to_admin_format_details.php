<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMinMaxCheckedToAdminFormatDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_format_details', function (Blueprint $table) {
        $table->integer('min')->nullable()->default('0')->after('question_id');
        $table->integer('max')->nullable()->default('0')->after('question_id');
        $table->integer('checked')->nullable()->after('question_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_format_details', function (Blueprint $table) {
            $table->dropColumn('min');
            $table->dropColumn('max');
            $table->dropColumn('checked');
        });
    }
}

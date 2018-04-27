<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailReportStatusToTemplatesMailSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('templates_mail_settings', function (Blueprint $table) {
            $table->tinyInteger('email_report_status')->default('0')->after('receiver_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('templates_mail_settings', function (Blueprint $table) {
             $table->dropColumn('email_report_status');
        });
    }
}

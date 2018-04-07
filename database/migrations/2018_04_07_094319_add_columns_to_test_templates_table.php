<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToTestTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_templates', function (Blueprint $table) {
           $table->longText('description')->nullable()->after('title');
           $table->longText('instruction')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_templates', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('instruction');
        });
    }
}

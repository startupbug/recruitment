<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTestTemplateTypeToTestTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_templates', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->after('id');
            $table->integer('template_type_id')->unsigned()->after('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('template_type_id')->references('id')->on('test_template_types')->onDelete('cascade')->onUpdate('cascade'); 
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
            $table->dropColumn('user_id');
            $table->dropColumn('template_type_id');
        });
    }
}

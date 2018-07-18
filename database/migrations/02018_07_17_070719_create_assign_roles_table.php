<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assign_role_details')->unsigned();
            $table->integer('assigned_user_id')->unsigned();
            $table->integer('assigner_id')->unsigned();
            $table->foreign('assign_role_details_id')->references('id')->on('assign_role_details')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_roles');
    }
}

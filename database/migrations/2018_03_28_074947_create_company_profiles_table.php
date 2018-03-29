<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('company_name')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
            $table->longText('company_message')->nullable();
            $table->longText('company_logo')->nullable();
            $table->timestamps();
            /* Assigning Foreign key */
            $table->foreign('user_id')->references('id')->on('users');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_profiles');
    }
}

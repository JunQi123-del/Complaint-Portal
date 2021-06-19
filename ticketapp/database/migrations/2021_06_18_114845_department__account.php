<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DepartmentAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DepartmentAccount',function(Blueprint $table){
            $table->bigIncrements('DaccountID');
            $table->string('AccountName');
            $table->string('AccountPW');
            $table->string('Email')->unique();
            $table->unsignedBigInteger('DepartmentID');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('Department');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('DepartmentAccount');
    }
}

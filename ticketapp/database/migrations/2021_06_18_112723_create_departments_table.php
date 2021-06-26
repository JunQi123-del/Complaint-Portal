<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments',function(Blueprint $table){
            $table->bigIncrements('id');    // department id
            $table->string('depart_name');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('administrators');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('departments');
    }
}
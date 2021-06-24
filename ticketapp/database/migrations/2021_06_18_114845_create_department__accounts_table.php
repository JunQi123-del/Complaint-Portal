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
        Schema::create('department_accounts',function(Blueprint $table){
            $table->bigIncrements('id');        // department account id
            $table->string('depart_acc_name');
            $table->string('depart_acc_pwd');
            $table->string('depart_acc_email');
            $table->unsignedBigInteger('depart_id');
            $table->foreign('depart_id')->references('id')->on('departments');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('department_accounts');
    }
}

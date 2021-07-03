<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentAccountsTable extends Migration
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

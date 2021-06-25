<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_comments',function(Blueprint $table){
            $table->bigIncrements('id');    // internal comment id
            $table->timestamps();
            $table->text('internal_comment');
            $table->string('attatchment');
            $table->unsignedBigInteger('depart_acc_id');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('depart_acc_id')->references('id')->on('department_accounts');
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
        Schema::dropifExists('internal_comments');
    }
}

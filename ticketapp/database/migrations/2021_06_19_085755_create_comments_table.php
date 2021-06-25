<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments',function(Blueprint $table){
            $table->bigIncrements('id');    // comment id
            $table->timestamps();
            $table->text('comment');
            $table->string('attatchment');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');
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
        Schema::dropifExists('comments');
    }
}

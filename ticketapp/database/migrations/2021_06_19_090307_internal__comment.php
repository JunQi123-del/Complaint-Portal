<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InternalComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('InternalCommnent',function(Blueprint $table){
            $table->bigIncrements('InternalCommentID');
            $table->dateTime('DateTime');
            $table->string('Message');
            $table->string('Attatchment');
            $table->unsignedBigInteger('TicketID');
            $table->foreign('TicketID')->references('TicketID')->on('Ticket');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('InternalComment');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comment',function(Blueprint $table){
            $table->bigIncrements('CommentID');
            $table->timestamps();
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
        Schema::dropifExists('Comment');
    }
}

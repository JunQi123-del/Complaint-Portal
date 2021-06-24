<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ticket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ticket',function(Blueprint $table){
            $table->bigIncrements('TicketID');
            $table->string('Title');
            $table->string('Message');
            $table->string('StatusName');
            $table->boolean('isAnonymous');
            $table->string('Category');
            $table->string('userBackground');
            $table->unsignedBigInteger('StudentID')->nullable(); // it can have a null value, thus not required
            $table->string('Major')->nullable();
            $table->string('FirstName')->nullable();
            $table->string('LastName')->nullable();
            $table->string('Email')->nullable();
            $table->string('Attatchment')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('AccountID');
            $table->unsignedBigInteger('DaccountID');
            $table->foreign('AccountID')->references('AccountID')->on('Administrator');
            $table->foreign('DaccountID')->references('DaccountID')->on('DepartmentAccount');
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('Ticket');
    }
}

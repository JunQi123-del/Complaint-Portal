<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets',function(Blueprint $table){
            $table->bigIncrements('id');    // ticket id
            $table->string('title');
            $table->text('message');
            $table->string('status');
            $table->boolean('is_anonymous');
            $table->string('category');
            $table->string('user_background')->nullable();
            $table->unsignedBigInteger('student_id')->nullable(); // it can have a null value, thus not required
            $table->string('school')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('attatchment')->nullable();
            $table->timestamps();
             });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropifExists('tickets');
    }
}

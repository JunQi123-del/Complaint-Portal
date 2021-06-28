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

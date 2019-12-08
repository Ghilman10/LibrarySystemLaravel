<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
           
            $table->increments('id');
            $table->integer('rack_id')->unsigned();
            $table->foreign('rack_id')->references('id')->on('racks')->onDelete('cascade');
            $table->string('title');
            $table->string('author');
            $table->smallinteger('year');
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
        Schema::dropIfExists('books');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	//
    	Schema::create('images', function (Blueprint $table) {
    		$table->increments('id');
    		$table->timestamps();
    		$table->string('fldFilename');
    		$table->integer('fldFoodId')->unsigned();
    		
    		$table->foreign('fldFoodId')->references('id')->on('foods')->onUpdate('cascade')->onDelete('cascade');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	//
    	Schema::drop('images');
    }
}

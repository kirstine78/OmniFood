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
    		$table->string('filename');
    		$table->integer('food_id')->unsigned()->index();
    		
    		$table->foreign('food_id')->references('id')->on('foods')->onUpdate('cascade')->onDelete('cascade');
    		$table->engine = 'InnoDB';
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

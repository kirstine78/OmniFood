<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	//
    	Schema::create('foods', function (Blueprint $table) {
    		$table->increments('id');
    		$table->timestamps();
    		$table->timestamp('fldDate')->nullable();
    		$table->tinyInteger('fldRating');
    		$table->string('fldComment')->nullable();
    		$table->integer('fldCountryId')->unsigned();
    		
    		$table->foreign('fldCountryId')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
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
    	Schema::drop('foods');
    }
}

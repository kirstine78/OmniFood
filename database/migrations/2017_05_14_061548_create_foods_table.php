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
    		$table->date('date');
    		$table->tinyInteger('rating');
    		$table->string('comment')->nullable();
    		$table->integer('country_id')->unsigned()->index();
    		
    		$table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
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
    	Schema::drop('foods');
    }
}

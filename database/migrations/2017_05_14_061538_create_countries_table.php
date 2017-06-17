<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('countries', function (Blueprint $table) {
    		$table->increments('id');
    		$table->timestamps();
    		$table->string('code')->unique(); 
    		$table->string('name')->unique();   		
    		$table->string('region');
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
    	Schema::drop('countries');
    }
}

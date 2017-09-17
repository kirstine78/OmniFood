<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConfirmedToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
        	$table->boolean('confirmed')->default(1);  // http://bensmith.io/email-verification-with-laravel
        	$table->string('confirmation_code')->nullable();  // http://bensmith.io/email-verification-with-laravel
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
        	$table->dropColumn('confirmed');  // http://bensmith.io/email-verification-with-laravel
        	$table->dropColumn('confirmation_code');  // http://bensmith.io/email-verification-with-laravel
        });
    }
}

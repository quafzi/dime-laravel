<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('alias')->unique();
            $table->string('name');
            $table->string('user_id');
            $table->boolean('enabled');
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
        Schema::table('customers', function(Blueprint $table) {
            $table->drop();
        });
	}
}

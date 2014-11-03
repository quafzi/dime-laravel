<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function(Blueprint $table) {
            $table->increments('id');
            $table->string('alias')->unique();
            $table->string('name');
            $table->string('customer_id');
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
        Schema::table('projects', function(Blueprint $table) {
            $table->drop();
        });
    }

}

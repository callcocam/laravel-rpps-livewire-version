<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('sessions')):
	Schema::create('sessions', function(Blueprint $table)
			{
                $table->string('id', 191)->unique();
			$table->integer('user_id')->unsigned()->nullable();
			$table->string('ip_address', 45)->nullable();
			$table->text('user_agent')->nullable();
			$table->text('payload');
			$table->integer('last_activity');
			});
endif;

	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if(Schema::hasTable('sessions')):
   Schema::drop('sessions');
endif;
	}

}

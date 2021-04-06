<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMandetieSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('mandetie_sessions')):
	Schema::create('mandetie_sessions', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('mandetie_sessions_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('mandetie_sessions_user_id_foreign');
			$table->string('name', 255)->nullable();
			$table->string('slug', 255)->nullable();
			$table->date('session_date')->nullable();
			$table->string('type', 255)->nullable();
			$table->string('pauta_session', 255)->nullable();
			$table->string('list_process', 255)->nullable();
			$table->string('ata_session', 255)->nullable();
			$table->string('vote_result', 255)->nullable();
			$table->text('description')->nullable();
			$table->integer('status')->nullable();
			$table->timestamps();
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
		if(Schema::hasTable('mandetie_sessions')):
   Schema::drop('mandetie_sessions');
endif;
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestPublicProcessingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('contest_public_processings')):
	Schema::create('contest_public_processings', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('contest_public_id');
			$table->integer('user_id');
			$table->integer('company_id');
			$table->dateTime('publication')->nullable()->comment('data da publicação do documento');
			$table->string('name', 200);
			$table->string('slug', 255);
			$table->string('file', 250)->comment('edital e anexos referente ao concurso -contest-');
			$table->integer('status')->default(1);
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
		if(Schema::hasTable('contest_public_processings')):
   Schema::drop('contest_public_processings');
endif;
	}

}

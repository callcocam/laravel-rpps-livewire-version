<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestPublicCompetitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('contest_public_competitions')):
	Schema::create('contest_public_competitions', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('contest_public_id');
			$table->integer('user_id');
			$table->integer('company_id');
			$table->timestamp('date_evaluation')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('aqui vem a data da prova escrita, de títulos, etc...');
			$table->string('name', 200)->comment('aqui vem o texto: Data da Prova Escrita, Data da prova de títulos, etc...');
			$table->string('slug', 255);
			$table->string('file', 100)->comment('edital e anexos referente ao concurso -contest-');
			$table->integer('status')->comment('1=seguir, ou seja permitir inscritos, 2=não seguir');
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
		if(Schema::hasTable('contest_public_competitions')):
   Schema::drop('contest_public_competitions');
endif;
	}

}

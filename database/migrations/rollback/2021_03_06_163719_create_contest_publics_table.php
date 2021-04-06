<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestPublicsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('contest_publics')):
	Schema::create('contest_publics', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id');
			$table->integer('company_id');
			$table->string('name', 255)->nullable()->comment('CONCURSO, PROCESSO SELETIVO, ETC');
			$table->integer('number')->comment('número do concurso-> 1, 2, 3 ...');
			$table->text('description')->comment('objeto do concurso, po exemplo, os cargos');
			$table->string('slug', 255);
			$table->timestamp('start_inscriptions')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Início das inscrições');
			$table->dateTime('end_subscriptions')->nullable()->comment('Fim das inscrições');
			$table->string('enrollment', 200)->comment('local de inscrição. Se for online, deixar inserir link para direcionamento');
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
		if(Schema::hasTable('contest_publics')):
   Schema::drop('contest_publics');
endif;
	}

}

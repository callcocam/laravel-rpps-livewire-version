<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('meeting_schedules')):
	Schema::create('meeting_schedules', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id')->index('fk_users_meeting_schedules_user_id');
			$table->integer('company_id')->index('fk_companys_meeting_schedules_company_id');
			$table->string('name', 50);
			$table->dateTime('reference_date')->nullable();
			$table->string('slug', 255)->nullable()->comment('url amigável');
			$table->text('schedule')->nullable()->comment('pauta da reunião, que pode gerar um oficio e encaminhar aos inscritos');
			$table->integer('participants')->comment('buscar na tabela member_groups o id do conselho e vincular ');
			$table->string('file', 255)->nullable()->comment('upload da ata da reunião .pdf');
			$table->string('locality', 255)->nullable()->default('Sede do São João Prev - Instituto de Previdência dos Servidores Públicos do Município de São João da Boa Vista');
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
		if(Schema::hasTable('meeting_schedules')):
   Schema::drop('meeting_schedules');
endif;
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberEntitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('member_entities')):
	Schema::create('member_entities', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id')->index('fk_users_member_entities_user_id');
			$table->integer('company_id')->index('fk_companys_member_entities_company_id');
			$table->string('name', 80)->comment('Cadastrar a entidade que representa, por ex.: Secretaria de Água e Esgoto, Prefeitura...');
			$table->string('slug', 255)->comment('url amigável entidade, por exemplo DIRETOR, SUPERINTENDENTE, PRESIDENTE, ETC');
			$table->text('description')->comment('Breve descrição da entidade e do porque tem representatividade, em quantos são etc...');
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
		if(Schema::hasTable('member_entities')):
   Schema::drop('member_entities');
endif;
	}

}

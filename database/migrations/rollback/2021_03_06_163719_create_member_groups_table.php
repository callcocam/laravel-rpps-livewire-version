<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('member_groups')):
	Schema::create('member_groups', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id')->index('fk_users_member_groups_user_id');
			$table->integer('company_id')->index('fk_companys_member_groups_company_id');
			$table->integer('transparencie_meeting_id')->nullable()->comment('id da ata da transparency_type-details');
			$table->string('name', 50)->comment('nome do grupo, por exemplo DIRETORIA, COLABORADORES, CONSELHOR CURADOR, CONSELHO FINANCEIRO, ETC');
			$table->string('slug', 255)->comment('url amigável nome do grupo, por exemplo DIRETORIA, COLABORADORES, CONSELHOR CURADOR, CONSELHO FINANCEIRO, ETC');
			$table->text('description')->nullable()->comment('Atribuições do conselho administrativo, fiscal, diretoria, etc...');
			$table->string('ordering', 20)->nullable()->default('id');
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
		if(Schema::hasTable('member_groups')):
   Schema::drop('member_groups');
endif;
	}

}

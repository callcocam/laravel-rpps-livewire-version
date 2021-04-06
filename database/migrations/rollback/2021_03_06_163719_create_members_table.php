<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('members')):
	Schema::create('members', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id')->index('fk_users_members_user_id');
			$table->integer('company_id')->index('fk_companys_members_company_id');
			$table->integer('user_member_id')->index('fk_users_members_user_member_id')->comment('buscar id no select da tabela users');
			$table->integer('user_member_suplente_id')->unsigned()->nullable()->index('members_user_member_suplente_id_foreign');
			$table->integer('member_group_id')->index('fk_member_groups_members_member_group_id')->comment('buscar id no select da tabela member_groups');
			$table->string('name', 255)->nullable();
			$table->integer('member_group_occupation_id')->index('fk_member_group_occupations_members_member_group_occupation_id')->comment('buscar id no select da tabela member_group_occupations');
			$table->integer('member_entity_id')->index('fk_member_entities_members_member_entity_id')->comment('buscar id no select da tabela member_entities');
			$table->integer('legis_id')->index('fk_legis_members_legis_id')->comment('buscar o id da lei na tabela legis');
			$table->integer('follow_up')->comment('1=seguir, ou seja permitir inscritos, 2=não seguir');
			$table->date('admission_date')->comment('Data de admissão');
			$table->date('end_mandate')->nullable()->comment('data término mandato');
			$table->date('admission_date_role')->nullable()->comment('data posse no cargo');
			$table->text('description')->nullable();
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
		if(Schema::hasTable('members')):
   Schema::drop('members');
endif;
	}

}

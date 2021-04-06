<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberGroupOccupationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('member_group_occupations')):
	Schema::create('member_group_occupations', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id')->index('fk_users_member_group_occupations_user_id');
			$table->integer('company_id')->index('fk_companys_member_group_occupations_company_id');
			$table->string('name', 50)->comment('cargo, por exemplo DIRETOR, SUPERINTENDENTE, PRESIDENTE, ETC');
			$table->string('slug', 255)->comment('url amigável cargo, por exemplo DIRETOR, SUPERINTENDENTE, PRESIDENTE, ETC');
			$table->text('description')->nullable()->comment('Atribuições do CARGO, o que faz, por exemplo');
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
		if(Schema::hasTable('member_group_occupations')):
   Schema::drop('member_group_occupations');
endif;
	}

}

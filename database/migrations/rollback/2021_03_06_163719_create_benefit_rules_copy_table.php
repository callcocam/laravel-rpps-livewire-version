<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitRulesCopyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('benefit_rules_copy')):
	Schema::create('benefit_rules_copy', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id')->index('fk_users_benefit_rules_user_id');
			$table->integer('company_id')->index('fk_companys_benefit_rules_company_id');
			$table->string('slug', 255);
			$table->string('name', 255);
			$table->text('description')->comment('tudo sobre a regra, por exemplo, aposentadoria por tempo: Requisitos e demais infos');
			$table->integer('publish_rule');
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
		if(Schema::hasTable('benefit_rules_copy')):
   Schema::drop('benefit_rules_copy');
endif;
	}

}

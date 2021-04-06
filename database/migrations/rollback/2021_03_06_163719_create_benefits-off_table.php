<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitsOffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('benefits-off')):
	Schema::create('benefits-off', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id')->index('fk_users_benefits_user_id');
			$table->integer('user_benefited_id')->index('fk_users_benefits_user_benefited_id')->comment('funcionário beneficiário, id capturado tabela users');
			$table->integer('company_id')->index('fk_companys_benefits_company_id');
			$table->integer('benefit_rule_id')->index('fk_benefit_rules_benefits_benefit_rule_id')->comment('campo da tabela benefit_rules, onde traz o id do benefício: aposentadoria por idade, tempos, etc...');
			$table->date('admission_date')->nullable()->comment('data de admissão no serviço público');
			$table->date('publication_date')->nullable()->comment('data da publicação da portaria de concessão');
			$table->string('process_number', 30)->nullable()->default('')->comment('Número do processo que originou o benefício');
			$table->string('grant_ordinance', 150)->nullable()->comment('Número da portaria de concessão');
			$table->date('grant_date')->nullable()->comment('data da concessão do benefício');
			$table->string('file', 255)->nullable()->comment('documento da concessão, por exemplo portaria, decreto, etc');
			$table->decimal('initial_salary', 9)->nullable();
			$table->decimal('current_salary', 9)->nullable();
			$table->string('registration', 50)->nullable()->comment('número da matrícula, geralmente 14 caracteres');
			$table->string('slug', 255)->nullable()->comment('url amigável');
			$table->integer('status')->comment('1=seguir, ou seja permitir inscritos, 2=não seguir');
			$table->timestamps();
			$table->softDeletes();
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
		if(Schema::hasTable('benefits-off')):
   Schema::drop('benefits-off');
endif;
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('contracts')):
	Schema::create('contracts', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index('contracts_user_id_foreign');
			$table->integer('company_id')->unsigned()->nullable()->index('contracts_company_id_foreign');
			$table->integer('bidding_id')->unsigned()->nullable()->index('contracts_bidding_id_foreign');
			$table->integer('contract_statu_id')->unsigned()->nullable()->index('contracts_contract_statu_id_foreign');
			$table->integer('bidding_competition_id')->unsigned()->nullable();
			$table->integer('number')->nullable();
			$table->string('slug', 255)->nullable()->comment('concatene number com ano da assinatura');
			$table->date('signature_date')->nullable()->comment('data da assinatura do contrato');
			$table->date('star_date')->nullable()->comment('data início da Vigência do contrato');
			$table->date('end_date')->nullable()->comment('data fim da Vigência do contrato');
			$table->string('file', 255)->nullable()->comment('arquivo: contrato');
			$table->string('file_extract', 255)->nullable()->comment('arquivo: extrato do contrato');
			$table->integer('status')->nullable()->default(1)->comment('1-ativo / 0=inativo');
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
		if(Schema::hasTable('contracts')):
   Schema::drop('contracts');
endif;
	}

}

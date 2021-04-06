<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractAmendmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('contract_amendments')):
	Schema::create('contract_amendments', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index('contract_amendments_user_id_foreign');
			$table->integer('company_id')->unsigned()->nullable()->index('contract_amendments_company_id_foreign');
			$table->integer('contract_id')->unsigned()->nullable()->index('contract_amendments_contract_id_foreign');
			$table->integer('reason_amendment_id')->unsigned()->nullable();
			$table->integer('contract_statu_id')->unsigned()->nullable()->index('contract_amendments_contract_statu_id_foreign');
			$table->string('number', 11)->nullable();
			$table->string('slug', 255)->nullable()->comment('concatene number com ano da assinatura');
			$table->date('amendment_signature_date')->nullable()->comment('data da assinatura do aditamento');
			$table->date('amendment_star_date')->nullable()->comment('data início da Vigência do aditamento');
			$table->date('amendment_end_date')->nullable()->comment('data fim da Vigência do aditamento');
			$table->decimal('price', 10, 4)->nullable();
			$table->string('file', 255)->nullable()->comment('arquivo: aditamento');
			$table->string('file_extract', 255)->nullable()->comment('arquivo: extrato do aditamento');
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
		if(Schema::hasTable('contract_amendments')):
   Schema::drop('contract_amendments');
endif;
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('inspections')):
	Schema::create('inspections', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index('inspections_user_id_foreign');
			$table->integer('company_id')->unsigned()->nullable()->index('inspections_company_id_foreign');
			$table->integer('user_inspection_id')->unsigned()->nullable()->index('inspections_user_inspection_id_foreign')->comment('id tab usuario que será o fiscal do contrato');
			$table->integer('contract_id')->unsigned()->nullable()->index('inspections_contract_id_foreign')->comment('id da contrato vinculado');
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
		if(Schema::hasTable('inspections')):
   Schema::drop('inspections');
endif;
	}

}

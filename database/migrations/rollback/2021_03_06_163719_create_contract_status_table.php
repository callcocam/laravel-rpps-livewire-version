<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('contract_status')):
	Schema::create('contract_status', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index('contract_status_user_id_foreign');
			$table->integer('company_id')->unsigned()->nullable()->index('contract_status_company_id_foreign');
			$table->string('name', 255);
			$table->string('slug', 255)->nullable();
			$table->string('variant', 255)->nullable()->default('success');
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
		if(Schema::hasTable('contract_status')):
   Schema::drop('contract_status');
endif;
	}

}

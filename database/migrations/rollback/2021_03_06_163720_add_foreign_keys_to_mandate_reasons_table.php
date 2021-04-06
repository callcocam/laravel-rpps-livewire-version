<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMandateReasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('mandate_reasons')):
	Schema::table('mandate_reasons', function(Blueprint $table)
			{
                $table->foreign('company_id')->references('id')->on('companies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		if(!Schema::hasTable('mandate_reasons')):
	Schema::table('mandate_reasons', function(Blueprint $table)
			{
                $table->dropForeign('mandate_reasons_company_id_foreign');
			$table->dropForeign('mandate_reasons_user_id_foreign');
			});
endif;

	}

}

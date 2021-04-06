<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMandatiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('mandaties')):
	Schema::table('mandaties', function(Blueprint $table)
			{
                $table->foreign('company_id')->references('id')->on('companies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('councilor_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('legislatury_id')->references('id')->on('legislaturies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('mandate_reason_id')->references('id')->on('mandate_reasons')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		if(!Schema::hasTable('mandaties')):
	Schema::table('mandaties', function(Blueprint $table)
			{
                $table->dropForeign('mandaties_company_id_foreign');
			$table->dropForeign('mandaties_councilor_id_foreign');
			$table->dropForeign('mandaties_legislatury_id_foreign');
			$table->dropForeign('mandaties_mandate_reason_id_foreign');
			$table->dropForeign('mandaties_user_id_foreign');
			});
endif;

	}

}

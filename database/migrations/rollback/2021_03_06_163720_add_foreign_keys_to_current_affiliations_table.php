<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCurrentAffiliationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('current_affiliations')):
	Schema::table('current_affiliations', function(Blueprint $table)
			{
                $table->foreign('affiliation_id')->references('id')->on('affiliations')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('company_id')->references('id')->on('companies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('councilor_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		if(!Schema::hasTable('current_affiliations')):
	Schema::table('current_affiliations', function(Blueprint $table)
			{
                $table->dropForeign('current_affiliations_affiliation_id_foreign');
			$table->dropForeign('current_affiliations_company_id_foreign');
			$table->dropForeign('current_affiliations_councilor_id_foreign');
			$table->dropForeign('current_affiliations_user_id_foreign');
			});
endif;

	}

}

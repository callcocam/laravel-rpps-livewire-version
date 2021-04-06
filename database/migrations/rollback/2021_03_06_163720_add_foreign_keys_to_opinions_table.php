<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOpinionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('opinions')):
	Schema::table('opinions', function(Blueprint $table)
			{
                $table->foreign('auditing_bodie_id')->references('id')->on('auditing_bodies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('company_id')->references('id')->on('companies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('kind_of_opinion_id')->references('id')->on('kind_of_opinions')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('process_statu_id')->references('id')->on('process_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		if(!Schema::hasTable('opinions')):
	Schema::table('opinions', function(Blueprint $table)
			{
                $table->dropForeign('opinions_auditing_bodie_id_foreign');
			$table->dropForeign('opinions_company_id_foreign');
			$table->dropForeign('opinions_kind_of_opinion_id_foreign');
			$table->dropForeign('opinions_process_statu_id_foreign');
			$table->dropForeign('opinions_user_id_foreign');
			});
endif;

	}

}

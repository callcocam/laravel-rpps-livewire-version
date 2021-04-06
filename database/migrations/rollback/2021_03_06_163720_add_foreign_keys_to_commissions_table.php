<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCommissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('commissions')):
	Schema::table('commissions', function(Blueprint $table)
			{
                $table->foreign('commission_type_id')->references('id')->on('commission_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('company_id')->references('id')->on('companies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('legislatury_id')->references('id')->on('legislaturies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('member_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('president_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('vice_president_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		if(!Schema::hasTable('commissions')):
	Schema::table('commissions', function(Blueprint $table)
			{
                $table->dropForeign('commissions_commission_type_id_foreign');
			$table->dropForeign('commissions_company_id_foreign');
			$table->dropForeign('commissions_legislatury_id_foreign');
			$table->dropForeign('commissions_member_id_foreign');
			$table->dropForeign('commissions_president_id_foreign');
			$table->dropForeign('commissions_user_id_foreign');
			$table->dropForeign('commissions_vice_president_id_foreign');
			});
endif;

	}

}

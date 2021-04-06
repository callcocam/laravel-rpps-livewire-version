<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToBoardOfDirectorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('board_of_directors')):
	Schema::table('board_of_directors', function(Blueprint $table)
			{
                $table->foreign('commission_type_id')->references('id')->on('commission_types')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('company_id')->references('id')->on('companies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('first_secretary_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('last_secretary_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('legislatury_id')->references('id')->on('legislaturies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('president_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		if(!Schema::hasTable('board_of_directors')):
	Schema::table('board_of_directors', function(Blueprint $table)
			{
                $table->dropForeign('board_of_directors_commission_type_id_foreign');
			$table->dropForeign('board_of_directors_company_id_foreign');
			$table->dropForeign('board_of_directors_first_secretary_id_foreign');
			$table->dropForeign('board_of_directors_last_secretary_id_foreign');
			$table->dropForeign('board_of_directors_legislatury_id_foreign');
			$table->dropForeign('board_of_directors_president_id_foreign');
			$table->dropForeign('board_of_directors_user_id_foreign');
			});
endif;

	}

}

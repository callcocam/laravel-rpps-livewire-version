<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToKindOfOpinionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('kind_of_opinions')):
	Schema::table('kind_of_opinions', function(Blueprint $table)
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
		if(!Schema::hasTable('kind_of_opinions')):
	Schema::table('kind_of_opinions', function(Blueprint $table)
			{
                $table->dropForeign('kind_of_opinions_company_id_foreign');
			$table->dropForeign('kind_of_opinions_user_id_foreign');
			});
endif;

	}

}

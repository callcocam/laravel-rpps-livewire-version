<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUserCertificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('user_certifications')):
	Schema::table('user_certifications', function(Blueprint $table)
			{
                $table->foreign('company_id')->references('id')->on('companies')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('user_certification_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		if(!Schema::hasTable('user_certifications')):
	Schema::table('user_certifications', function(Blueprint $table)
			{
                $table->dropForeign('user_certifications_company_id_foreign');
			$table->dropForeign('user_certifications_user_certification_id_foreign');
			$table->dropForeign('user_certifications_user_id_foreign');
			});
endif;

	}

}

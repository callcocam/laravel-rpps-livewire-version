<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('members')):
	Schema::table('members', function(Blueprint $table)
			{
                $table->foreign('user_member_suplente_id')->references('id')->on('users')->onUpdate('NO ACTION')->onDelete('NO ACTION');
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
		if(!Schema::hasTable('members')):
	Schema::table('members', function(Blueprint $table)
			{
                $table->dropForeign('members_user_member_suplente_id_foreign');
			});
endif;

	}

}

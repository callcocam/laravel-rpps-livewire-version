<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('role_user')):
	Schema::create('role_user', function(Blueprint $table)
			{
                $table->integer('role_id')->unsigned();
			$table->integer('user_id')->unsigned()->index('role_user_user_id_foreign');
			$table->primary(['role_id','user_id']);
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
		if(Schema::hasTable('role_user')):
   Schema::drop('role_user');
endif;
	}

}

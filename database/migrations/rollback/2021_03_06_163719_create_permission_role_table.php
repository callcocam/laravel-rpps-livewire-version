<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('permission_role')):
	Schema::create('permission_role', function(Blueprint $table)
			{
                $table->integer('permission_id')->unsigned();
			$table->integer('role_id')->unsigned()->index('permission_role_role_id_foreign');
			$table->primary(['permission_id','role_id']);
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
		if(Schema::hasTable('permission_role')):
   Schema::drop('permission_role');
endif;
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDropboxsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('dropboxs')):
	Schema::create('dropboxs', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('dropboxs_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('dropboxs_user_id_foreign');
			$table->integer('parent')->nullable();
			$table->string('assets', 20)->nullable()->default('users');
			$table->string('name', 255);
			$table->string('slug', 255)->nullable();
			$table->string('folder', 255)->nullable();
			$table->string('type', 255)->nullable();
			$table->string('with', 255)->nullable();
			$table->integer('status')->default(0)->comment('1-ativo / 0=inativo');
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
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
		if(Schema::hasTable('dropboxs')):
   Schema::drop('dropboxs');
endif;
	}

}

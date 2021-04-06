<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkUtilsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('link_utils')):
	Schema::create('link_utils', function(Blueprint $table)
			{
                $table->bigInteger('id', true)->unsigned();
			$table->integer('company_id')->unsigned()->index('links_utils_company_id_foreign');
			$table->integer('user_id')->unsigned()->index('links_utils_user_id_foreign');
			$table->string('name', 255);
			$table->string('link', 255)->nullable();
			$table->string('cover', 255)->nullable();
			$table->string('icone', 50)->nullable();
			$table->string('attributes', 50)->nullable();
			$table->text('description')->nullable();
			$table->integer('ordering')->nullable()->default(0);
			$table->integer('status')->nullable()->default(0)->comment('1-ativo / 0=inativo');
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
		if(Schema::hasTable('link_utils')):
   Schema::drop('link_utils');
endif;
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinkUsefulsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('link_usefuls')):
	Schema::create('link_usefuls', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->index('link_usefuls_company_id_foreign');
			$table->integer('user_id')->unsigned()->index('link_usefuls_user_id_foreign');
			$table->string('name', 255);
			$table->string('link', 255)->nullable();
			$table->string('cover', 255)->nullable();
			$table->string('icone', 50)->nullable();
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
		if(Schema::hasTable('link_usefuls')):
   Schema::drop('link_usefuls');
endif;
	}

}

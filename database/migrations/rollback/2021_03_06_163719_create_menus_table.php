<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('menus')):
	Schema::create('menus', function(Blueprint $table)
			{
                $table->bigInteger('id', true)->unsigned();
			$table->integer('company_id')->unsigned()->index('menus_company_id_foreign');
			$table->integer('user_id')->unsigned()->index('menus_user_id_foreign');
			$table->string('name', 255);
			$table->text('description')->nullable();
			$table->integer('ordering')->nullable()->default(0);
			$table->string('sibling', 255)->nullable();
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
		if(Schema::hasTable('menus')):
   Schema::drop('menus');
endif;
	}

}

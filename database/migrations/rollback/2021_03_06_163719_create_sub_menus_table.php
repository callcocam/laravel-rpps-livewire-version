<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('sub_menus')):
	Schema::create('sub_menus', function(Blueprint $table)
			{
                $table->bigInteger('id', true)->unsigned();
			$table->integer('menu_id')->nullable();
			$table->integer('company_id')->unsigned()->index('sub_menus_company_id_foreign');
			$table->integer('user_id')->unsigned()->index('sub_menus_user_id_foreign');
			$table->integer('parent')->nullable();
			$table->string('assets', 255)->nullable();
			$table->string('name', 255);
			$table->string('slug', 255)->nullable();
			$table->string('link', 255)->nullable();
			$table->string('icone', 50)->nullable();
			$table->string('attributes', 50)->nullable();
			$table->text('description')->nullable();
			$table->integer('ordering')->nullable()->default(0);
			$table->integer('restricted')->nullable();
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
		if(Schema::hasTable('sub_menus')):
   Schema::drop('sub_menus');
endif;
	}

}

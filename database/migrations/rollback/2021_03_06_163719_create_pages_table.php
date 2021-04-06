<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('pages')):
	Schema::create('pages', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('sliders_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('sliders_user_id_foreign');
			$table->string('name', 255);
			$table->string('slug', 255)->nullable();
			$table->string('preview', 255)->nullable();
			$table->text('description')->nullable();
			$table->integer('status')->default(0)->comment('1-ativo / 0=inativo');
			$table->date('published_up')->nullable();
			$table->date('published_down')->nullable();
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
		if(Schema::hasTable('pages')):
   Schema::drop('pages');
endif;
	}

}

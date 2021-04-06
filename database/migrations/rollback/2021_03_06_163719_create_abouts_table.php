<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('abouts')):
	Schema::create('abouts', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->index('abouts_company_id_foreign');
			$table->integer('user_id')->unsigned()->index('abouts_user_id_foreign');
			$table->string('name', 255);
			$table->string('preview', 255)->nullable();
			$table->string('cover', 255)->nullable();
			$table->text('description')->nullable();
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
		if(Schema::hasTable('abouts')):
   Schema::drop('abouts');
endif;
	}

}

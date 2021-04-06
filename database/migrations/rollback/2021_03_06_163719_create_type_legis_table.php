<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeLegisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('type_legis')):
	Schema::create('type_legis', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('type_legis_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('type_legis_user_id_foreign');
			$table->string('name', 191)->nullable();
			$table->string('slug', 191)->nullable();
			$table->integer('status')->nullable();
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
		if(Schema::hasTable('type_legis')):
   Schema::drop('type_legis');
endif;
	}

}

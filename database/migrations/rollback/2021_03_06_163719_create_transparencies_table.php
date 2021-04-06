<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransparenciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('transparencies')):
	Schema::create('transparencies', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('transparencies_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('transparencies_user_id_foreign');
			$table->integer('transparency_type_detail_id')->unsigned()->nullable()->index('transparencies_transparency_type_detail_id_foreign');
			$table->string('name', 191)->nullable();
			$table->string('slug', 191)->nullable();
			$table->dateTime('reference_date')->nullable()->comment('data da referência do documento, ou seja, data da competência');
			$table->string('file', 191)->nullable();
			$table->text('description')->nullable();
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
		if(Schema::hasTable('transparencies')):
   Schema::drop('transparencies');
endif;
	}

}

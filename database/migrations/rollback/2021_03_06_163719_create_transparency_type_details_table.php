<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransparencyTypeDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('transparency_type_details')):
	Schema::create('transparency_type_details', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('transparency_type_details_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('transparency_type_details_user_id_foreign');
			$table->integer('transparency_type_id')->unsigned()->nullable()->index('transparency_type_details_transparency_type_id_foreign');
			$table->string('name', 191)->nullable();
			$table->string('slug', 191)->nullable();
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
		if(Schema::hasTable('transparency_type_details')):
   Schema::drop('transparency_type_details');
endif;
	}

}

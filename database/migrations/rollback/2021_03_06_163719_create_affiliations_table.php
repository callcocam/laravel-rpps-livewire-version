<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffiliationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('affiliations')):
	Schema::create('affiliations', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('affiliations_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('affiliations_user_id_foreign');
			$table->string('name', 255)->nullable();
			$table->string('slug', 255)->nullable();
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
		if(Schema::hasTable('affiliations')):
   Schema::drop('affiliations');
endif;
	}

}

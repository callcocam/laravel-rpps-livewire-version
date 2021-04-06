<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentAffiliationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('current_affiliations')):
	Schema::create('current_affiliations', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('current_affiliations_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('current_affiliations_user_id_foreign');
			$table->integer('councilor_id')->unsigned()->nullable()->index('current_affiliations_councilor_id_foreign');
			$table->integer('affiliation_id')->unsigned()->nullable()->index('current_affiliations_affiliation_id_foreign');
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
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
		if(Schema::hasTable('current_affiliations')):
   Schema::drop('current_affiliations');
endif;
	}

}

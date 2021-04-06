<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKindOfActsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('kind_of_acts')):
	Schema::create('kind_of_acts', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('kind_of_acts_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('kind_of_acts_user_id_foreign');
			$table->integer('councilor_id')->unsigned()->nullable()->index('kind_of_acts_councilor_id_foreign');
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
		if(Schema::hasTable('kind_of_acts')):
   Schema::drop('kind_of_acts');
endif;
	}

}

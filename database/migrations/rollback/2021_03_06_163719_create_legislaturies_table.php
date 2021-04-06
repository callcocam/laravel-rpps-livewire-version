<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegislaturiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('legislaturies')):
	Schema::create('legislaturies', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('legislaturies_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('legislaturies_user_id_foreign');
			$table->string('name', 255)->nullable();
			$table->string('slug', 255)->nullable();
			$table->string('mayor', 255)->nullable();
			$table->string('vice_mayor', 255)->nullable();
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
		if(Schema::hasTable('legislaturies')):
   Schema::drop('legislaturies');
endif;
	}

}

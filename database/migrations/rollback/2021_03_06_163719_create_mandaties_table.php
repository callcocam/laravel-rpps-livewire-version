<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMandatiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('mandaties')):
	Schema::create('mandaties', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('mandaties_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('mandaties_user_id_foreign');
			$table->integer('councilor_id')->unsigned()->nullable()->index('mandaties_councilor_id_foreign');
			$table->integer('legislatury_id')->unsigned()->nullable()->index('mandaties_legislatury_id_foreign');
			$table->integer('mandate_reason_id')->unsigned()->nullable()->index('mandaties_mandate_reason_id_foreign');
			$table->date('date_start')->nullable();
			$table->date('date_end')->nullable();
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
		if(Schema::hasTable('mandaties')):
   Schema::drop('mandaties');
endif;
	}

}

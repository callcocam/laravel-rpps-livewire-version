<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMandateReasonsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('mandate_reasons')):
	Schema::create('mandate_reasons', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('mandate_reasons_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('mandate_reasons_user_id_foreign');
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
		if(Schema::hasTable('mandate_reasons')):
   Schema::drop('mandate_reasons');
endif;
	}

}

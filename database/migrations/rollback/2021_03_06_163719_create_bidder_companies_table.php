<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidderCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('bidder_companies')):
	Schema::create('bidder_companies', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id');
			$table->integer('company_id');
			$table->string('name', 255)->comment('Nome da empresa...');
			$table->string('slug', 255)->comment('nome-da-empresa');
			$table->string('cnpj', 18)->nullable()->default('');
			$table->string('ie', 15)->nullable();
			$table->string('email', 150)->nullable();
			$table->string('phone', 15)->nullable();
			$table->integer('status')->default(1);
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
		if(Schema::hasTable('bidder_companies')):
   Schema::drop('bidder_companies');
endif;
	}

}

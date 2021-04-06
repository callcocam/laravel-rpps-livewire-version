<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingTypeDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('bidding_type_documents')):
	Schema::create('bidding_type_documents', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id');
			$table->integer('company_id');
			$table->string('name', 255)->comment('EDITAL E SEUS ANEXOS, RETIFICAÇÃO DO EDITAL, ADJUDICAÇÃO, ETC...');
			$table->string('slug', 255);
			$table->text('description');
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
		if(Schema::hasTable('bidding_type_documents')):
   Schema::drop('bidding_type_documents');
endif;
	}

}

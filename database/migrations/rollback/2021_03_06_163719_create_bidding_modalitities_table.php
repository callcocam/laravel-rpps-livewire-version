<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingModalititiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('bidding_modalitities')):
	Schema::create('bidding_modalitities', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id');
			$table->integer('company_id');
			$table->string('name', 255)->comment('modalidade: PREGÃO PRESENCIAL, PREGÃO ONLINE, CARTA CONVITE, TOMADA DE PREÇOS, ETC...');
			$table->string('slug', 255);
			$table->text('description')->comment('breve comentário sobre o que é a modalidade');
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
		if(Schema::hasTable('bidding_modalitities')):
   Schema::drop('bidding_modalitities');
endif;
	}

}

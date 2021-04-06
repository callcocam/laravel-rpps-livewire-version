<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingCompetitionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('bidding_competitions')):
	Schema::create('bidding_competitions', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id');
			$table->integer('company_id');
			$table->integer('bidder_company_id')->comment('select da tabela bidder_companies com o cadastro da empresa');
			$table->integer('bidding_id')->comment('select da tabela biddings para vincular a licitação');
			$table->dateTime('published_in')->nullable()->comment('data do acontecimento');
			$table->text('object')->comment('Objeto da licitação na integra');
			$table->decimal('price', 9)->comment('Preço estimado da licitação');
			$table->integer('status')->comment('1=seguir, ou seja permitir inscritos, 2=não seguir');
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
		if(Schema::hasTable('bidding_competitions')):
   Schema::drop('bidding_competitions');
endif;
	}

}

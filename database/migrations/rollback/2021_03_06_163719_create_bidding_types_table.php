<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('bidding_types')):
	Schema::create('bidding_types', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id');
			$table->integer('company_id');
			$table->string('name', 255)->comment('MENOR PREÇO, MELHOR TÉCNICA, TÉCNICA E PREÇO, MAIOR LANCE OU OFERTA, ETC...');
			$table->string('slug', 255);
			$table->text('description')->comment('breve comentário sobre o que é o tipo');
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
		if(Schema::hasTable('bidding_types')):
   Schema::drop('bidding_types');
endif;
	}

}

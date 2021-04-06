<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('bidding_status')):
	Schema::create('bidding_status', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id');
			$table->integer('company_id');
			$table->string('name', 255)->comment('ABERTA, ENCERRADA, DESERTA, ETC...');
			$table->string('slug', 255);
			$table->string('variant', 15)->nullable()->default('success');
			$table->text('description')->comment('breve comentário sobre o que é o status');
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
		if(Schema::hasTable('bidding_status')):
   Schema::drop('bidding_status');
endif;
	}

}

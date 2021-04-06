<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('citys')):
	Schema::create('citys', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('company_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->integer('number');
			$table->string('name', 255);
			$table->string('state', 2);
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
		if(Schema::hasTable('citys')):
   Schema::drop('citys');
endif;
	}

}

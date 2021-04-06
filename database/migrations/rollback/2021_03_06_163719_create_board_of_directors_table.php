<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardOfDirectorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('board_of_directors')):
	Schema::create('board_of_directors', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('board_of_directors_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('board_of_directors_user_id_foreign');
			$table->integer('commission_type_id')->unsigned()->nullable()->index('board_of_directors_commission_type_id_foreign');
			$table->integer('president_id')->unsigned()->nullable()->index('board_of_directors_president_id_foreign');
			$table->integer('first_secretary_id')->unsigned()->nullable()->index('board_of_directors_first_secretary_id_foreign');
			$table->integer('last_secretary_id')->unsigned()->nullable()->index('board_of_directors_last_secretary_id_foreign');
			$table->integer('member_id')->unsigned()->nullable();
			$table->integer('legislatury_id')->unsigned()->nullable()->index('board_of_directors_legislatury_id_foreign');
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
		if(Schema::hasTable('board_of_directors')):
   Schema::drop('board_of_directors');
endif;
	}

}

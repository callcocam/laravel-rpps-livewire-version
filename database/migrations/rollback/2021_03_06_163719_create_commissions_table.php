<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('commissions')):
	Schema::create('commissions', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('commissions_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('commissions_user_id_foreign');
			$table->integer('commission_type_id')->unsigned()->nullable()->index('commissions_commission_type_id_foreign');
			$table->integer('president_id')->unsigned()->nullable()->index('commissions_president_id_foreign');
			$table->integer('vice_president_id')->unsigned()->nullable()->index('commissions_vice_president_id_foreign');
			$table->integer('member_id')->unsigned()->nullable()->index('commissions_member_id_foreign');
			$table->integer('legislatury_id')->unsigned()->nullable()->index('commissions_legislatury_id_foreign');
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
		if(Schema::hasTable('commissions')):
   Schema::drop('commissions');
endif;
	}

}

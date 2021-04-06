<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditingBodiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('auditing_bodies')):
	Schema::create('auditing_bodies', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index('auditing_bodies_user_id_foreign');
			$table->integer('company_id')->unsigned()->nullable()->index('auditing_bodies_company_id_foreign');
			$table->string('name', 255)->nullable();
			$table->string('slug', 255)->nullable();
			$table->text('description')->nullable();
			$table->integer('status')->nullable()->default(1)->comment('1-ativo / 0=inativo');
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
		if(Schema::hasTable('auditing_bodies')):
   Schema::drop('auditing_bodies');
endif;
	}

}

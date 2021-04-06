<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLegisTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('legis')):
	Schema::create('legis', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('legis_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('legis_user_id_foreign');
			$table->integer('type_legi_id')->unsigned()->nullable()->index('legis_type_legi_id_foreign');
			$table->string('number', 11)->nullable()->default('');
			$table->text('name')->nullable();
			$table->text('slug')->nullable();
			$table->string('external_link', 191)->nullable();
			$table->date('published_up')->nullable();
			$table->string('file', 191)->nullable();
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
		if(Schema::hasTable('legis')):
   Schema::drop('legis');
endif;
	}

}

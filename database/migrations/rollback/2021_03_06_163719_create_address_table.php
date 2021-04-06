<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('address')):
	Schema::create('address', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->index('address_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('address_user_id_foreign');
			$table->integer('parent');
			$table->string('assets', 20);
			$table->string('slug', 100)->nullable();
			$table->string('name', 100)->nullable();
			$table->string('zip', 20)->nullable();
			$table->string('city', 100)->nullable();
			$table->string('state', 2)->nullable()->default('SC');
			$table->string('street', 255)->nullable();
			$table->string('district', 100)->nullable();
			$table->string('number', 15)->nullable()->default('S/N');
			$table->string('complements', 255)->nullable();
			$table->string('country', 50)->nullable()->default('BRASIL');
			$table->string('longetude', 20)->nullable();
			$table->string('latitude', 20)->nullable();
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
		if(Schema::hasTable('address')):
   Schema::drop('address');
endif;
	}

}

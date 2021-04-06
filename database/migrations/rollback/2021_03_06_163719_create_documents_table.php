<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('documents')):
	Schema::create('documents', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->index('documents_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('documents_user_id_foreign');
			$table->integer('parent');
			$table->string('assets', 20);
			$table->string('name', 100);
			$table->string('value', 100);
			$table->string('description', 191)->nullable();
			$table->integer('status')->default(1)->comment('1-ativo / 0=inativo');
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
		if(Schema::hasTable('documents')):
   Schema::drop('documents');
endif;
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollectionBooksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('collection_books')):
	Schema::create('collection_books', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('user_id')->unsigned()->index('collection_books_user_id_foreign');
			$table->integer('company_id')->unsigned()->index('collection_books_company_id_foreign');
			$table->string('name', 255)->comment('nome da empresa ou órgão');
			$table->string('slug', 255)->nullable()->comment('nome-da-empresa-ou-orgao');
			$table->string('file', 255)->nullable();
			$table->dateTime('published_up')->nullable();
			$table->dateTime('published_down')->nullable();
			$table->text('description')->nullable()->comment('descrição sobre os acervos');
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
		if(Schema::hasTable('collection_books')):
   Schema::drop('collection_books');
endif;
	}

}

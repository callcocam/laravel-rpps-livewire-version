<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingDocumentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('bidding_documents')):
	Schema::create('bidding_documents', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id');
			$table->integer('company_id');
			$table->integer('bidding_id');
			$table->integer('bidding_type_document_id');
			$table->string('name', 255)->comment('pequena descrição do que seria o documento que está sendo inserido');
			$table->string('slug', 255)->comment('pequena-descricao-do-que-seria-o-documento-que-esta-sendo-inserido');
			$table->string('file', 255)->nullable()->comment('arquivo da tramitação da licitaão, por exemplos: editais, pareceres, perguntas, etc...');
			$table->dateTime('published_in')->nullable()->comment('data da publicação do arquivo');
			$table->integer('status')->comment('1=seguir, ou seja permitir inscritos, 2=não seguir');
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
		if(Schema::hasTable('bidding_documents')):
   Schema::drop('bidding_documents');
endif;
	}

}

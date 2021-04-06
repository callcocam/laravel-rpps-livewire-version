<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('biddings')):
	Schema::create('biddings', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id')->nullable();
			$table->integer('company_id')->nullable();
			$table->integer('bidding_modality_id')->nullable()->comment('select da tabela bidding_modalitities que seria a modalidade da licitação');
			$table->integer('bidding_status_id')->nullable()->comment('select da tabela bidding_status: Aberta, Encerrada, Deserta, etc...');
			$table->integer('bidding_type_id')->nullable()->comment('select da tabela bidding_types: MENOR PREÇO, MELHOR TÉCNICA, TÉCNICA E PREÇO, MAIOR LANCE OU OFERTA, etc...');
			$table->string('number', 10)->nullable()->comment('número da licitação, não inserir junto com o ano, pois o mesmo será extraído do campo published_in');
			$table->string('process', 100)->nullable()->comment('número do processo. Aceito número e outros formatos, por exemplo: SEC/ADM/001/2018');
			$table->dateTime('published_in')->nullable()->comment('data da publicação da licitação');
			$table->string('location_published', 200)->nullable()->comment('local(is) que foi publicado o edital');
			$table->text('locality')->nullable()->comment('local que ocorrerá o certame');
			$table->dateTime('competition_date')->nullable()->comment('data e hora do certame');
			$table->text('elucidation')->nullable()->comment('Esclarecimentos: endereço ou forma de contato para esclarecimentos');
			$table->text('object')->comment('Objeto da licitação na integra');
			$table->decimal('estimated_price', 9)->nullable()->comment('Preço estimado da licitação');
			$table->decimal('homologated_price', 9)->nullable()->comment('Preço homologado na licitação');
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
		if(Schema::hasTable('biddings')):
   Schema::drop('biddings');
endif;
	}

}

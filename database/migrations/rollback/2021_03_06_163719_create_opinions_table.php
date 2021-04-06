<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpinionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('opinions')):
	Schema::create('opinions', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('opinions_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('opinions_user_id_foreign');
			$table->integer('auditing_bodie_id')->unsigned()->nullable()->index('opinions_auditing_bodie_id_foreign');
			$table->integer('kind_of_opinion_id')->unsigned()->nullable()->index('opinions_kind_of_opinion_id_foreign');
			$table->integer('process_statu_id')->unsigned()->nullable()->index('opinions_process_statu_id_foreign');
			$table->string('name', 255)->nullable();
			$table->string('slug', 255)->nullable();
			$table->string('file', 255)->nullable();
			$table->date('inspection_date')->nullable();
			$table->date('inspected_period_start')->nullable()->comment('(período inspecionado) - data início ');
			$table->date('inspected_period_end')->nullable()->comment('(período inspecionado) - data fim');
			$table->string('audited_month', 100)->nullable()->comment('mês auditado, por exemplo janeiro - 01; fevereiro - 02; etc');
			$table->string('audited_year', 100)->nullable()->comment('ano auditado, por exemplo 2000, 2001, etc');
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
		if(Schema::hasTable('opinions')):
   Schema::drop('opinions');
endif;
	}

}

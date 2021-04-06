<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCertificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('user_certifications')):
	Schema::create('user_certifications', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('user_id')->unsigned()->nullable()->index('user_certifications_user_id_foreign');
			$table->integer('user_certification_id')->unsigned()->nullable()->index('user_certifications_user_certification_id_foreign');
			$table->integer('company_id')->unsigned()->nullable()->index('user_certifications_company_id_foreign');
			$table->string('name', 255)->nullable()->comment('concatene number com ano da assinatura');
			$table->string('slug', 255)->nullable()->comment('concatene number com ano da assinatura');
			$table->date('certification_date')->nullable()->comment('data de inicio da certification');
			$table->date('certification_update')->nullable()->comment('data da ultima atualização');
			$table->date('certification_end')->nullable()->comment('data fim da certification');
			$table->text('file')->nullable()->comment('arquivo da certification');
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
		if(Schema::hasTable('user_certifications')):
   Schema::drop('user_certifications');
endif;
	}

}

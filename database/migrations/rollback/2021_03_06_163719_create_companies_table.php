<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('companies')):
	Schema::create('companies', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->nullable();
			$table->integer('type')->default(1);
			$table->string('assets', 255)->default('sistema');
			$table->text('preview')->nullable();
			$table->string('name', 255);
			$table->string('sub_title', 255)->nullable();
			$table->string('email', 100)->unique();
			$table->string('slug', 255)->nullable();
			$table->string('cover', 255)->default('/dist/uploads/images/no_image.jpg');
			$table->string('whatsapp', 50)->nullable();
			$table->string('contact_url', 255)->nullable();
			$table->text('description')->nullable();
			$table->text('service_hours')->nullable()->comment('HorÃ¡rio de atendimento ao pÃºblico');
			$table->integer('status')->nullable()->default(1)->comment('1-ativo / 0=inativo');
			$table->timestamps();
			$table->integer('user_id')->unsigned()->nullable()->index('companies_user_id_foreign');
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
		if(Schema::hasTable('companies')):
   Schema::drop('companies');
endif;
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersCopyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('users_copy')):
	Schema::create('users_copy', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->index('users_company_id_foreign');
			$table->string('assets', 191)->default('users');
			$table->string('name', 255);
			$table->string('slug', 255);
			$table->string('office', 255)->nullable()->comment('cargo do usuário na instituição');
			$table->string('document', 255)->nullable();
			$table->string('profession', 255)->nullable();
			$table->integer('vereador_old_id')->nullable();
			$table->string('genre', 50)->nullable();
			$table->string('email', 100)->unique('users_email_unique');
			$table->string('username', 100)->unique('users_username_unique');
			$table->string('password', 255)->nullable();
			$table->date('date_birth')->nullable()->comment('data de nascimento do usuário');
			$table->string('nationality', 200)->nullable();
			$table->string('cover', 255)->default('/files/1/default.png');
			$table->text('description')->nullable();
			$table->integer('status')->default(0)->comment('1-ativo / 0=inativo');
			$table->string('remember_token', 100)->nullable();
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
		if(Schema::hasTable('users_copy')):
   Schema::drop('users_copy');
endif;
	}

}

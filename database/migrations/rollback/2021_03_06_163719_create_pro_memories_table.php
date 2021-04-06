<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProMemoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('pro_memories')):
	Schema::create('pro_memories', function(Blueprint $table)
			{
                $table->increments('id');
			$table->integer('company_id')->unsigned()->nullable()->index('sliders_company_id_foreign');
			$table->integer('user_id')->unsigned()->nullable()->index('sliders_user_id_foreign');
			$table->string('title', 255)->nullable()->default('');
			$table->string('cover', 255)->nullable()->default('dist/uploads/images/no_image.jpg');
			$table->text('description')->nullable();
			$table->integer('status')->default(0)->comment('1-ativo / 0=inativo');
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
		if(Schema::hasTable('pro_memories')):
   Schema::drop('pro_memories');
endif;
	}

}

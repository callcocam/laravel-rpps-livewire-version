<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if(!Schema::hasTable('payment_schedules')):
	Schema::create('payment_schedules', function(Blueprint $table)
			{
                $table->integer('id', true);
			$table->integer('user_id');
			$table->integer('company_id');
			$table->integer('competence')->comment('1=JANEIRO, 2=FEVEREIRO, ..., 13= 13º SALÁRIO, 14=1ª PARCELA 13º SALÁRIO');
			$table->date('reference_date')->nullable()->comment('data pagamento');
			$table->string('slug', 255)->nullable()->comment('url amigável');
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
		if(Schema::hasTable('payment_schedules')):
   Schema::drop('payment_schedules');
endif;
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('categories')):
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index('categories_user_id_foreign');
                $table->integer('company_id')->unsigned()->index('categories_company_id_foreign');
                $table->string('assets', 255)->default('users');
                $table->string('name', 255)->comment('categoria do blog, por exemplo: Investimentos');
                $table->string('slug', 255)->comment('categoria');
                $table->string('cover', 255)->default('/dist/uploads/images/no_image.jpg')->comment('capa');
                $table->integer('draft')->nullable()->default(0);
                $table->text('description')->nullable();
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
        if (Schema::hasTable('categories')):
            Schema::drop('categories');
        endif;
    }

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posts')):
            Schema::create('posts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->index('posts_user_id_foreign');
                $table->integer('company_id')->unsigned()->index('posts_company_id_foreign');
                $table->integer('category_id')->unsigned()->index('posts_category_id_foreign');
                $table->string('name', 255)->comment('nome do blog');
                $table->string('slug', 255)->comment('nome-do-blog');
                $table->string('subtitle', 255)->comment('subtítulo do blog');
                $table->text('description')->comment('contéudo do post');
                $table->string('cover', 255)->comment('imagem do blog');
                $table->string('video', 100)->nullable()->comment('vídeo do blog');
                $table->integer('views')->nullable();
                $table->timestamp('lastview')->default(DB::raw('CURRENT_TIMESTAMP'));
                $table->integer('instant_article')->default(0);
                $table->string('tags', 255)->comment('tags');
                $table->integer('status')->default(1)->comment('1-ativo / 0=inativo');
                $table->timestamps();
                $table->string('assets', 191)->default('noticies')->comment('define se uma noticia ou post');
                $table->dateTime('published_up')->nullable();
                $table->dateTime('published_down')->nullable();
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
        if (Schema::hasTable('posts')):
            Schema::drop('posts');
        endif;
    }

}

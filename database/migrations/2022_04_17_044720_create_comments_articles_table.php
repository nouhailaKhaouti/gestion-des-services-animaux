<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('comments_articles', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('on_article');
                $table->unsignedBigInteger('from_user');
                $table->foreign('on_article')
                  ->references('id')->on('articles')
                  ->onDelete('cascade');
                $table->foreign('from_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
                $table->text('body');
                $table->timestamps();
              });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments_articles');
    }
}

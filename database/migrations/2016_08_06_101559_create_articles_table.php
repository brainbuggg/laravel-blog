<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->text('excerpt')->nullable();
            $table->timestamp('published_at');
            $table->timestamps();
            $table->integer('user_id')->unsigned();
            $table->integer('category_id')->unsigned();

            /**
            * Relationship: you might not want to use it if the dependent
            * relationship will be deleted
            */
            $table->foreign('user_id')->references('id')->on('users'); // delete dependents
            $table->foreign('category_id')->references('id')->on('categories'); // delete dependents
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}

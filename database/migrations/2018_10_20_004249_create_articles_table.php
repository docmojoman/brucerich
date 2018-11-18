<?php

use Illuminate\Support\Facades\Schema;
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
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('author');
            $table->string('publication');
            $table->string('date');
            $table->unsignedSmallInteger('page');
            $table->text('description');
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('pdf')->nullable();
            $table->unsignedInteger('group_id');
            $table->boolean('published')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}

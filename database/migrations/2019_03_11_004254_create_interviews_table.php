<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->string('slug');
            $table->text('introduction')->nullable();
            $table->string('author')->nullable();
            $table->string('publication')->nullable();
            $table->string('date')->nullable();
            $table->string('page')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->string('pdf')->nullable();
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
        Schema::dropIfExists('interviews');
    }
}

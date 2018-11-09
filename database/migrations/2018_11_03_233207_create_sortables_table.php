<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSortablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortables', function (Blueprint $table) {
            $table->primary(['sort_id', 'sortable_id', 'sortable_type']);
            $table->unsignedInteger('sort_id');
            $table->unsignedInteger('sortable_id');
            $table->string('sortable_type');
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
        Schema::dropIfExists('sortables');
    }
}

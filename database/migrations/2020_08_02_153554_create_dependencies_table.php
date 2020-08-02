<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('dependencies', function (Blueprint $table) {
            $table->unsignedBigInteger('depending_id')->comment('依存元ID');
            $table->unsignedBigInteger('depended_id')->comment('依存先ID');

            $table->foreign('depending_id')->references('id')->on('products');
            $table->foreign('depended_id')->references('id')->on('products');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependencies');
    }
}

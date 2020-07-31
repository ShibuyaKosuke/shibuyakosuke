<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->unsignedBigInteger('author_id')->comment('作者ID');
            $table->string('name')->comment('プロダクト名');
            $table->string('repository_url')->comment('レポジトリURL');
            $table->timestamp('created_at')->nullable()->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->comment('作成日時');
            $table->softDeletes()->comment('削除日時');
            $table->tableComment('プロダクト');

            $table->foreign('author_id')->references('id')->on('users');
        });
        Schema::disableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

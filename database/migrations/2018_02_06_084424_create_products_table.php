<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->integer('active')->length(1)->default(0);
            $table->integer('rank');
            $table->string('slug');
            $table->integer('product_categories_id');
            $table->foreign('product_categories_id')->references('id')->on('product_categories');
            $table->integer('brand_id');
            $table->foreign('brand_id')->references('marca')->on('li_marche');
        });
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

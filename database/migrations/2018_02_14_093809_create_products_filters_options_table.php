<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsFiltersOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_filters_options', function (Blueprint $table) {
            $table->string('codice_articolo')->length(10);
            $table->foreign('codice_articolo')->references('codice_articolo')->on('products');
            $table->integer('filter_option_id');
            $table->foreign('filter_option_id')->references('id')->on('filter_options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_filters_options');
    }
}

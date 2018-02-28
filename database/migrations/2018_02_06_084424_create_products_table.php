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
            $table->string('codice_articolo')->length(10);
            $table->string('name');
            $table->string('description');
            $table->string('price');
            $table->integer('active')->length(1)->default(0);
            $table->integer('rank');
            $table->string('slug');
            $table->integer('brand_id');
            $table->foreign('brand_id')->references('marca')->on('li_marche');
            $table->integer('tavolozza_colori');
            $table->foreign('tavolozza_colori')->references('tavolozza_colori')->on('li_articoli');
            $table->integer('tipo_taglia');
            $table->foreign('tipo_taglia')->references('tipo_taglia')->on('li_taglie');
            $table->integer('language_id');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->integer('tipo_taglia_normalizzata');
            $table->foreign('tipo_taglia_normalizzata')->references('tipo_taglia2')->on('li_taglie');
            $table->index('codice_articolo');
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

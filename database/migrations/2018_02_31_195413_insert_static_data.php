<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertStaticData extends Migration
{
    public function up()
    {
        $languages = array(
            array(
                'name' => 'Italiano',
                'code' => 'it',
                'is_primary' => 1,
                'active' => 1
            ),
            array(
                'name' => 'English',
                'code' => 'en',
                'is_primary' => 0,
                'active' => 1
            ),
            array(
                'name' => 'Spanish',
                'code' => 'sp',
                'is_primary' => 0,
                'active' => 0
            )
        );
        DB::table('languages')->insert($languages);

        $templates = array(
            array(
                'name' => 'Home page',
                'view' => 'homepage'
            ),
            array(
                'name' => 'Pagina',
                'view' => 'pages.detail'
            ),
            array(
                'name' => 'Lista News',
                'view' => 'pages.newslist'
            ),
            array(
                'name' => 'Lista categorie prodotti',
                'view' => 'pages.productcategorieslist'
            ),
            array(
                'name' => 'Lista prodotti',
                'view' => 'pages.productslist'
            ),
            array(
                'name' => 'Dettaglio news',
                'view' => 'news.detail'
            ),
            array(
                'name' => 'Dettaglio prodotto',
                'view' => 'products.detail'
            )
        );

        DB::table('templates')->insert($templates);

        $pages = array(
            array(
                'name' => 'Home page',
                'content' => 'Home page content',
                'active' => 1,
                'template_id' => 1,
                'language_id' => 1,
                'parent' => 0,
                'slug' => '',
            ),
            array(
                'name' => 'Home page EN',
                'content' => 'Home page content EN',
                'active' => 1,
                'template_id' => 1,
                'language_id' => 2,
                'parent' => 0,
                'slug' => 'en',
            ),
            array(
                'name' => 'Pagina 1 IT',
                'content' => 'Contenuto Pagina 1 IT',
                'active' => 1,
                'template_id' => 2,
                'language_id' => 1,
                'parent' => 0,
                'slug' => 'pagina-1-IT-2',
            ),
            array(
                'name' => 'Pagina 2 IT',
                'content' => 'Contenuto Pagina 2 IT',
                'active' => 0,
                'template_id' => 2,
                'language_id' => 1,
                'parent' => 0,
                'slug' => 'pagina-2-IT-3',
            ),
            array(
                'name' => 'Pagina 1 EN',
                'content' => 'Contenuto Pagina 1 EN',
                'active' => 1,
                'template_id' => 2,
                'language_id' => 2,
                'parent' => 0,
                'slug' => 'en/pagina-1-EN-4',
            ),
            array(
                'name' => 'Pagina 2 EN',
                'content' => 'Contenuto Pagina 2 EN',
                'active' => 0,
                'template_id' => 2,
                'language_id' => 2,
                'parent' => 0,
                'slug' => 'en/pagina-2-EN-5',
            ),
            array(
                'name' => 'Pagina 1 di 1 IT',
                'content' => 'Contenuto Pagina 1 di 1 IT',
                'active' => 1,
                'template_id' => 2,
                'language_id' => 1,
                'parent' => 3,
                'slug' => 'pagina-1-di-1-IT',
            ),
            array(
                'name' => 'Pagina 1 di 1 EN',
                'content' => 'Contenuto Pagina 1 di 1 EN',
                'active' => 1,
                'template_id' => 2,
                'language_id' => 2,
                'parent' => 5,
                'slug' => 'en/pagina-1-di-1-EN',
            ),
            array(
                'name' => 'Lista news IT',
                'content' => 'Lista news IT',
                'active' => 1,
                'template_id' => 3,
                'language_id' => 1,
                'parent' => 0,
                'slug' => 'lista-news-IT',
            ),
            array(
                'name' => 'Lista news EN',
                'content' => 'Lista news EN',
                'active' => 1,
                'template_id' => 3,
                'language_id' => 2,
                'parent' => 0,
                'slug' => 'en/lista-news-EN',
            ),
            array(
                'name' => 'Lista categorie prodotti IT',
                'content' => 'Lista prodotti IT',
                'active' => 1,
                'template_id' => 4,
                'language_id' => 1,
                'parent' => 0,
                'slug' => 'lista-prodotti-IT',
            ),
            array(
                'name' => 'Lista categorie prodotti EN',
                'content' => 'Lista prodotti EN',
                'active' => 1,
                'template_id' => 4,
                'language_id' => 2,
                'parent' => 0,
                'slug' => 'en/lista-prodotti-EN',
            )
        );

        DB::table('pages')->insert($pages);

        $news = array(
            array(
                'title' => 'news 1 IT',
                'content' => 'content news 1 IT',
                'date' => '20180205',
                'language_id' => '1',
                'slug' => 'lista-news-IT/news-1-IT'
            ),
            array(
                'title' => 'news 1 EN',
                'content' => 'content news 1 EN',
                'date' => '20180205',
                'language_id' => '2',
                'slug' => 'en/lista-news-EN/news-1-EN'
            )
        );

        DB::table('news')->insert($news);




        $slugs = array(
            array(
                'slug' => '',
                'model' => 'Page',
                'seo_title' => 'Title',
                'seo_description' => 'Description',
            ),
            array(
                'slug' => 'en',
                'model' => 'Page',
                'seo_title' => 'Title Home EN',
                'seo_description' => 'Description Home EN',
            ),
            array(
                'slug' => 'pagina-1-IT-2',
                'model' => 'Page',
                'seo_title' => 'Title pagina-1-IT',
                'seo_description' => 'Description pagina-1-IT',
            ),
            array(
                'slug' => 'pagina-2-IT-3',
                'model' => 'Page',
                'seo_title' => 'Title pagina-2-IT',
                'seo_description' => 'Description pagina-2-IT',
            ),
            array(
                'slug' => 'en/pagina-1-EN-4',
                'model' => 'Page',
                'seo_title' => 'Title pagina-1-EN',
                'seo_description' => 'Description pagina-1-EN',
            ),
            array(
                'slug' => 'en/pagina-2-EN-5',
                'model' => 'Page',
                'seo_title' => 'Title pagina-2-EN',
                'seo_description' => 'Description pagina-2-EN',
            ),
            array(
                'slug' => 'pagina-1-di-1-IT',
                'model' => 'Page',
                'seo_title' => 'Title pagina-1-di-1-IT',
                'seo_description' => 'Description pagina-1-di-1-IT',
            ),
            array(
                'slug' => 'en/pagina-1-di-1-EN',
                'model' => 'Page',
                'seo_title' => 'Title pagina-1-di-1-EN',
                'seo_description' => 'Description pagina-1-di-1-EN',
            ),
            array(
                'slug' => 'en/lista-news-EN/news-1-EN',
                'model' => 'News',
                'seo_title' => 'Title news-1-EN',
                'seo_description' => 'Description news-1-EN',
            ),
            array(
                'slug' => 'lista-news-IT/news-1-IT',
                'model' => 'News',
                'seo_title' => 'Title news-1-IT',
                'seo_description' => 'Description news-1-IT',
            ),
            array(
                'slug' => 'lista-news-IT',
                'model' => 'Page',
                'seo_title' => 'Title lista-news-IT',
                'seo_description' => 'Description pagina-1-di-1-IT',
            ),
            array(
                'slug' => 'en/lista-news-EN',
                'model' => 'Page',
                'seo_title' => 'Title lista-news-EN',
                'seo_description' => 'Description pagina-1-di-1-EN',
            ),
            array(
                'slug' => 'lista-prodotti-IT',
                'model' => 'Page',
                'seo_title' => 'Title lista-prodotti-IT',
                'seo_description' => 'Description lista prodotti 1 IT',
            ),
            array(
                'slug' => 'en/lista-prodotti-EN',
                'model' => 'Page',
                'seo_title' => 'Title lista-prodotti-EN',
                'seo_description' => 'Description lista prodotti 1 EN',
            ),
            array(
                'slug' => 'lista-prodotti-IT/categoria-1-IT',
                'model' => 'ProductCategory',
                'seo_title' => 'Title categoria prodotti 1 IT',
                'seo_description' => 'Description categoria prodotti 1 IT',
            ),
            array(
                'slug' => 'en/lista-prodotti-EN/categoria-1-EN',
                'model' => 'ProductCategory',
                'seo_title' => 'Title categoria prodotti 1 EN',
                'seo_description' => 'Description categoria prodotti 1 EN',
            ),
            array(
                'slug' => 'sport/calcio-e-calcetto/scarpe-e-parastinchi',
                'model' => 'ProductCategory',
                'seo_title' => 'Title categoria prodotti 1 EN',
                'seo_description' => 'Description categoria prodotti 1 EN',
            ),
            array(
                'slug' => 'sport/calcio-e-calcetto',
                'model' => 'ProductCategory',
                'seo_title' => 'Title categoria prodotti 1 EN',
                'seo_description' => 'Description categoria prodotti 1 EN',
            ),
            array(
                'slug' => 'sport',
                'model' => 'ProductCategory',
                'seo_title' => 'Title categoria prodotti 1 EN',
                'seo_description' => 'Description categoria prodotti 1 EN',
            ),
            array(
                'slug' => 'lista-prodotti-IT/categoria-1-IT/prodotto-1-IT',
                'model' => 'Product',
                'seo_title' => 'Title prodotto 1 IT',
                'seo_description' => 'Description prodotto 1 IT',
            ),
            array(
                'slug' => 'lista-prodotti-IT/categoria-1-IT/prodotto-2-IT',
                'model' => 'Product',
                'seo_title' => 'Title prodotti 2 IT',
                'seo_description' => 'Description prodotto 2 IT',
            ),
            array(
                'slug' => 'en/lista-prodotti-EN/categoria-1-EN/prodotto-1-EN',
                'model' => 'Product',
                'seo_title' => 'Title prodotti 1 EN',
                'seo_description' => 'Description prodotto 1 EN',
            ),
            array(
                'slug' => 'en/lista-prodotti-EN/categoria-1-EN/prodotto-2-EN',
                'model' => 'Product',
                'seo_title' => 'Title prodotti 2 EN',
                'seo_description' => 'Description prodotto 2 EN',
            )
        );

DB::table('slugs')->insert($slugs);


$product_categories = array(
    array(
        'name' => 'categoria 1 IT',
        'description' => 'content categoria 1 IT',
        'active' => '1',
        'rank' => '1',
        'language_id' => '1',
        'slug' => 'lista-prodotti-IT/categoria-1-IT',
        'parent' => '0'
    ),
    array(
        'name' => 'categoria 1 EN',
        'description' => 'content categoria 1 EN',
        'active' => '1',
        'rank' => '1',
        'language_id' => '2',
        'slug' => 'en/lista-prodotti-EN/categoria-1-EN',
        'parent' => '0'
    ),
    array(
        'name' => 'sport',
        'description' => '',
        'active' => '1',
        'rank' => '10',
        'language_id' => '1',
        'slug' => 'sport',
        'parent' => '0'
    ),
    array(
        'name' => 'calcio e calcetto',
        'description' => '',
        'active' => '1',
        'rank' => '1',
        'language_id' => '1',
        'slug' => 'sport/calcio-e-calcetto',
        'parent' => '3'
    ),
    array(
        'name' => 'scarpe e parastinchi',
        'description' => '',
        'active' => '1',
        'rank' => '1',
        'language_id' => '1',
        'slug' => 'sport/calcio-e-calcetto/scarpe-e-parastinchi',
        'parent' => '4'
    )
);

DB::table('product_categories')->insert($product_categories);

$products = array(
    array(
        'codice_articolo' => '98339812',
        'name' => 'prodotto 1 IT',
        'description' => 'description prodotto 1 IT',
        'price' => '1000',
        'active' => '1',
        'rank' => '1',
        'brand_id' => '412',
        'tavolozza_colori' => '7305',
        'tipo_taglia' => '506',
        'tipo_taglia_normalizzata' => '691',
        'slug' => 'lista-prodotti-IT/categoria-1-IT/prodotto-1-IT',
        'language_id' => '1'
    ),
    array(
        'codice_articolo' => '98338106',
        'name' => 'prodotto 2 IT',
        'description' => 'description prodotto 2 IT',
        'price' => '1100',
        'active' => '1',
        'rank' => '10',
        'brand_id' => '9',
        'tavolozza_colori' => '201',
        'tipo_taglia' => '506',
        'tipo_taglia_normalizzata' => '320',
        'slug' => 'lista-prodotti-IT/categoria-1-IT/prodotto-2-IT',
        'language_id' => '1'
    ),
    array(
        'codice_articolo' => '98339812',
        'name' => 'prodotto 1 EN',
        'description' => 'description prodotto 1 EN',
        'price' => '2000',
        'active' => '1',
        'rank' => '1',
        'brand_id' => '412',
        'tavolozza_colori' => '7305',
        'tipo_taglia' => '506',
        'tipo_taglia_normalizzata' => '691',
        'slug' => 'en/lista-prodotti-EN/categoria-1-EN/prodotto-1-EN',
        'language_id' => '2'
    ),
    array(
        'codice_articolo' => '98338106',
        'name' => 'prodotto 2 EN',
        'description' => 'description prodotto 2 EN',
        'price' => '2100',
        'active' => '1',
        'rank' => '10',
        'brand_id' => '9',
        'tavolozza_colori' => '201',
        'tipo_taglia' => '506',
        'tipo_taglia_normalizzata' => '320',
        'slug' => 'en/lista-prodotti-EN/categoria-1-EN/prodotto-2-EN',
        'language_id' => '2'
    )
);

DB::table('products')->insert($products);


$json = file_get_contents("https://www.df-sportspecialist.it/calcio-e-calcetto/scarpe-e-protezioni/?go=1");
$json = json_decode($json);
if(!empty($json)){
   foreach($json as $codice_articolo){
    $rows = DB::select("SELECT descrizione, prezzo_finale, marchio, tavolozza_colori, tipo_taglia, tipo_taglia2 FROM li_articoli WHERE codice_articolo = '".$codice_articolo."' LIMIT 1");
    foreach($rows as $row){
        $products = array(
            array(
                'codice_articolo' => $codice_articolo,
                'name' => $row->descrizione,
                'description' => 'description prodotto 1 IT',
                'price' => $row->prezzo_finale,
                'active' => '1',
                'rank' => '1',
                'brand_id' => $row->marchio,
                'tavolozza_colori' => $row->tavolozza_colori,
                'tipo_taglia' => $row->tipo_taglia,
                'tipo_taglia_normalizzata' => $row->tipo_taglia2,
                'slug' => $codice_articolo,
                'language_id' => '1'
            )
        );
        DB::table('products')->insert($products);

        $slugs = array(
            array(
                'slug' => $codice_articolo,
                'model' => 'Product',
                'seo_title' => $row->descrizione,
                'seo_description' => 'Description prodotto 2 EN',
            )
        );

        DB::table('slugs')->insert($slugs);

        $products_in_categories = array(
            array(
                'codice_articolo' => $codice_articolo,
                'product_category_id' => '5'
            )
        );

        DB::table('products_in_categories')->insert($products_in_categories);
    }

    $rows2 = DB::select("SELECT * FROM ec_tag_articoli_sport WHERE codice_articolo = '".$codice_articolo."'");
    foreach($rows2 as $row2){
        $products_filters_options = array(
            array(
                'codice_articolo' => $codice_articolo,
                'filter_option_id' => $row2->id_opzione
            )
        );
        DB::table('products_filters_options')->insert($products_filters_options);
    }
}
}

$rows = DB::select("SELECT * FROM ec_tag_categorizzazione_sport WHERE categoria_id = '792'");
foreach($rows as $row){
    $filters = array(
        array(
            'id' => $row->id,
            'name' => strtolower($row->tag),
            'rank' => $row->ordinale,
            'product_category_id' => 5
        )
    );
    DB::table('filters')->insert($filters);

    $rows_options = DB::select("SELECT * FROM ec_tag_categorizzazione_opzioni_sport WHERE tag_id = '".$row->id."'");
    foreach($rows_options as $row_options){
        $filter_options = array(
            array(
                'id' => $row_options->id,
                'name' => strtolower($row_options->nome),
                'rank' => $row_options->ordinale,
                'filter_id' => $row->id
            )
        );
        DB::table('filter_options')->insert($filter_options);
    }
}

}

public function down()
{
        //
}
}

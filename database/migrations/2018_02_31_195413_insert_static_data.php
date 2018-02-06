<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertStaticData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
            )
        );

        DB::table('pages')->insert($pages);


        $news = array(
            array(
                'title' => 'news 1 IT',
                'content' => 'content news 1 IT',
                'date' => '20180205',
                'language_id' => '1',
                'slug' => 'news-1-IT'
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
                'slug' => 'news-1-IT',
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
        );

        DB::table('slugs')->insert($slugs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

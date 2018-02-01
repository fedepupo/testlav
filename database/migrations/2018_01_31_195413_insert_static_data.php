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
        DB::table('languages')->insert(
            array(
                'name' => 'Italiano',
                'code' => 'it',
                'is_primary' => 1,
                'active' => 1
            )
        );

        DB::table('templates')->insert(
            array(
                'name' => 'Home page'
            )
        );

        DB::table('pages')->insert(
            array(
                'name' => 'Home page',
                'content' => 'Home page content',
                'active' => 1,
                'template' => 1,
                'language' => 'it',
                'slug' => '/',
            )
        );
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

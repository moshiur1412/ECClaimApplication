<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('faculties')->truncate();
        DB::table('faculties')->insert([
            [
            'name' => 'Faculty of Business & Economics',
            ],
            [
            'name' => 'Faculty of Science and Information Technology',
            ],
            [
            'name' => 'Faculty of Engineering',
            ],
            [
            'name' => 'Faculty of Allied Health Science',
            ],
            [
            'name' => 'Faculty of Humanities & Social Science',
            ],
            ]);
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

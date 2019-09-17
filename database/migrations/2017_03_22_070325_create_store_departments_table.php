<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('departments')->truncate();
        DB::table('departments')->insert([
            [
            'name' => 'Department of Business Administration',
            'faculty_id' => '1',
            ],
            [
            'name' => 'Department of Tourism & Hospitality Management',
            'faculty_id' => '1',
            ],
            [
            'name' => 'Department of Real Estate',
            'faculty_id' => '1',
            ],

            [
            'name' => 'Department of Business Information Technology (BIT)',
            'faculty_id' => '2',
            ],
            [
            'name' => 'Department of Computer Science and Engineering',
            'faculty_id' => '2',
            ],
            [
            'name' => 'Department of Software Engineering',
            'faculty_id' => '2',
            ],
            [
            'name' => 'Department of Multimedia & Creative Technology (MCT)',
            'faculty_id' => '2',
            ],


            [
            'name' => 'Department of Electronics and Telecommunication Engineering',
            'faculty_id' => '3',
            ],
            [
            'name' => 'Department of Textile Engineering',
            'faculty_id' => '3',
            ],
            [
            'name' => 'Department of Civil Engineering',
            'faculty_id' => '3',
            ],


            [
            'name' => 'Department of Pharmacy',
            'faculty_id' => '4',
            ],
            [
            'name' => 'Department of Nutrition and Food Engineering',
            'faculty_id' => '4',
            ],
            [
            'name' => 'Department of Public Health',
            'faculty_id' => '4',
            ],

            [
            'name' => 'Department of English',
            'faculty_id' => '5',
            ],
            [
            'name' => 'Department of Law',
            'faculty_id' => '5',
            ],
            [
            'name' => 'Department of Journalism & Mass Communication',
            'faculty_id' => '5',
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

<?php

use Illuminate\Database\Seeder;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
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

    public function stor(){
        http://faculty.daffodilvarsity.edu.bd/
        
        DB::table('faculties')->insert([
            [
            'faculty_name' => 'Business Information Technology (BIT)',
            'ec_coordinator_name' => 'Rumi Sir',
            ],
            [
            'faculty_name' => 'Level 5 Diploma in Computing (L5DC)',
            'ec_coordinator_name' => 'Shiplu Sir',
            ],
            [
            'faculty_name' => 'Level 4 Diploma in Computing (L4DC)',
            'ec_coordinator_name' => 'Aziz Sir',
            ]
            ]);
    }

}

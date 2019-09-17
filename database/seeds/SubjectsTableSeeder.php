<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('subjects')->truncate();
    	DB::table('subjects')->insert([
    		[
    		'name' => 'Introduction to Business',
    		'department_id' => ('1'),
    		],
            [
            'name' => 'Financial Accounting',
            'department_id' => ('1'),
            ],
            [
            'name' => 'Business Communication',
            'department_id' => ('1'),
            ],

            [
            'name' => 'Database Engineering (DE)',
            'department_id' => ('4'),
            ],
            [
            'name' => 'Enterprise Web Software Development (EWSD)',
            'department_id' => ('4'),
            ],
            [
            'name' => 'Project (Information Systems & Multimedia)',
            'department_id' => ('4'),
            ],
            [
            'name' => 'Information Requirements Analysis (IRA)',
            'department_id' => ('4'),
            ],
            [
            'name' => 'Information Technology Planning (ITP)',
            'department_id' => ('4'),
            ],
            [
            'name' => 'Development, Frameworks and Methods (DFM)',
            'department_id' => ('4'),
            ],
            [
            'name' => 'Interaction Design (ID)',
            'department_id' => ('4'),
            ],
            
            ]);
    }
}

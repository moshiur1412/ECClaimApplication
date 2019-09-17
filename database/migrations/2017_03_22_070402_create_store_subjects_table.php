<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('subjects')->truncate();
        DB::table('subjects')->insert([
            // Department of Business Administration
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
            // Department of Tourism & Hospitality Management
             [
            'name' => 'The Hospitality Business',
            'department_id' => ('2'),
            ],
            [
            'name' => 'Business of Tourism',
            'department_id' => ('2'),
            ],
            [
            'name' => 'Tourism Policy and Development',
            'department_id' => ('2'),
            ],
            // Department of Real Estate
             [
            'name' => 'Real Estate Finance',
            'department_id' => ('3'),
            ],
            [
            'name' => 'Current Legal Issues',
            'department_id' => ('3'),
            ],
            [
            'name' => 'Human Land Use',
            'department_id' => ('3'),
            ],
            // Department of Business Information Technology (BIT)
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
             // Department of Computer Science and Engineering
             [
            'name' => 'Fundamental Programming Concepts',
            'department_id' => ('5'),
            ],
            [
            'name' => 'Introduction to Computing Using Python',
            'department_id' => ('5'),
            ],
            [
            'name' => 'Introduction to Computing Using MATLAB',
            'department_id' => ('5'),
            ],
             // Department of Software Engineering
             [
            'name' => 'Fundamental Software Engineering ',
            'department_id' => ('6'),
            ],
            [
            'name' => 'Introduction to Programming',
            'department_id' => ('6'),
            ],
            [
            'name' => 'Introduction to Computing',
            'department_id' => ('6'),
            ],
             // Department of Multimedia & Creative Technology (MCT)
             [
            'name' => 'Fundamental Creative Technology ',
            'department_id' => ('7'),
            ],
            [
            'name' => 'Introduction to Creative Technology',
            'department_id' => ('7'),
            ],
            [
            'name' => 'Introduction to Multimedia & Creative Technology',
            'department_id' => ('7'),
            ],
            // Department of Electronics and Telecommunication Engineering
             [
            'name' => 'Fundamental Electronics and Telecommunication Engineering',
            'department_id' => ('8'),
            ],
            [
            'name' => 'Introduction to Electronics Engineering',
            'department_id' => ('8'),
            ],
            [
            'name' => 'Introduction to Telecommunication Engineering',
            'department_id' => ('8'),
            ],
            // Department of Textile Engineering
             [
            'name' => 'Fundamental Textile Engineering',
            'department_id' => ('9'),
            ],
            [
            'name' => 'Introduction to Textile Engineering',
            'department_id' => ('9'),
            ],
            [
            'name' => 'Introduction to Textile Ethices',
            'department_id' => ('9'),
            ],
            // Department of Civil Engineering
             [
            'name' => 'Fundamental Civil Engineering',
            'department_id' => ('10'),
            ],
            [
            'name' => 'Introduction to Civil Engineering',
            'department_id' => ('10'),
            ],
            [
            'name' => 'Introduction to Civil Engineering issues',
            'department_id' => ('10'),
            ],
            // Department of Pharmacy
             [
            'name' => 'Fundamental Pharmacy',
            'department_id' => ('11'),
            ],
            [
            'name' => 'Introduction to Pharmacy',
            'department_id' => ('11'),
            ],
            [
            'name' => 'Introduction to Pharmacy LAB',
            'department_id' => ('11'),
            ],
            // Department of Nutrition and Food Engineering
             [
            'name' => 'Fundamental Nutrition and Food Engineering',
            'department_id' => ('12'),
            ],
            [
            'name' => 'Introduction to Nutrition Engineering',
            'department_id' => ('12'),
            ],
            [
            'name' => 'Introduction to Food Engineering',
            'department_id' => ('12'),
            ],
            // Department of Public Health
             [
            'name' => 'Fundamental Public Health',
            'department_id' => ('13'),
            ],
            [
            'name' => 'Introduction to Public Health',
            'department_id' => ('13'),
            ],
            [
            'name' => 'Introduction to Public Health Care',
            'department_id' => ('13'),
            ],
            // Department of English
             [
            'name' => 'Fundamental English',
            'department_id' => ('14'),
            ],
            [
            'name' => 'Introduction to literature',
            'department_id' => ('14'),
            ],
            [
            'name' => 'English Grammer Review',
            'department_id' => ('14'),
            ],
            // Department of Law
             [
            'name' => 'Fundamental Low',
            'department_id' => ('15'),
            ],
            [
            'name' => 'Introduction to Low',
            'department_id' => ('15'),
            ],
            [
            'name' => 'Introduction to Low factors',
            'department_id' => ('15'),
            ],
            // Department of Journalism & Mass Communication
             [
            'name' => 'Fundamental Journalism & Mass Communication',
            'department_id' => ('16'),
            ],
            [
            'name' => 'Introduction to Journalism & Mass Communication',
            'department_id' => ('16'),
            ],
            [
            'name' => 'Introduction to Journalism factors',
            'department_id' => ('16'),
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

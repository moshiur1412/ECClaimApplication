<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             DB::table('assessments')->truncate();
        DB::table('assessments')->insert([
            [
            'name' => 'Sports System',
            'deadline' => '2016-11-21',
            'subject_id' => '10'
            ],
            [
            'name' => 'Strategic Evaluation Document for Rashid-Marcos-Umahi',
            'deadline' => '2016-11-02',
            'subject_id' => '14'
            ],
            [
            'name' => 'The NightWatch (NW)',
            'deadline' => '2016-11-24',
            'subject_id' => '15'
            ],
            [
            'name' => 'Ec Claim System',
            'deadline' => '2017-04-13',
            'subject_id' => '11'
            ],
            [
            'name' => 'Game Developement',
            'deadline' => '2016-04-15',
            'subject_id' => '16'
            ],
            [
            'name' => 'Own Project',
            'deadline' => '2017-04-25',
            'subject_id' => '13'
            ],
            [
            'name' => 'Starting Business Concept',
            'deadline' => '2017-02-05',
            'subject_id' => '1'
            ],
            [
            'name' => 'Business Concept generate',
            'deadline' => '2017-02-22',
            'subject_id' => '2'
            ]
            
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

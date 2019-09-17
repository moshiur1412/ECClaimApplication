<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreEcClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::table('ec_claims')->truncate();
        DB::table('ec_claims')->insert([
            [
            'assessment_id' => '1',
            'user_id' => '17',
            'claim_criteria' => 'Physical Injury',
            'note' => 'Physical Injury sir, Please consider ...',
            'evidence_01' => '',
            'evidence_02' => null,
            'evidence_03' => null,
            'status' => 'Date has been expired.',
            'created_at' => '2016-03-22'
            ],
            [
            'assessment_id' => '2',
            'user_id' => '17',
            'claim_criteria' => 'Mental Illness',
            'note' => 'Mental Problem sir, I can t say something...',
            'evidence_01' => 'evidence_01.jpg',
            'evidence_02' => null,
            'evidence_03' => null,
            'status' => 'Date has been expired.',
            'created_at' => '2016-03-22'
            ],

            [
            'assessment_id' => '5',
            'user_id' => '17',
            'claim_criteria' => 'Family Issues',
            'note' => 'I have some family problem, please... ',
           'evidence_01' => 'evidence_02.docx',
            'evidence_02' => null,
            'evidence_03' => null,
            'status' => 'Rejected : Not allowed.',
            'created_at' => '2017-03-22',
            ],

            [
            'assessment_id' => '6',
            'user_id' => '18',
            'claim_criteria' => 'Resource Damage',
            'note' => 'My computer HDD drive completely destroyed , please consider...',
            'evidence_01' => 'evidence_03.pdf',
            'evidence_02' => null,
            'evidence_03' => null,
            'status' => 'pending',
            'created_at' => '2017-03-23',
            ],

            [
            'assessment_id' => '4',
            'user_id' => '18',
            'claim_criteria' => 'Mental Illness',
            'note' => 'Its not my problem, My brain is damaged ...',
            'evidence_01' => 'evidence_01.jpg',
            'evidence_02' => null,
            'evidence_03' => null,
            'status' => 'Accepted : okay, done.',
            'created_at' => '2017-03-24',
            ],
            [
            'assessment_id' => '7',
            'user_id' => '4',
            'claim_criteria' => 'Mental Illness',
            'note' => 'Its not my problem, My brain is not work ...',
            'evidence_01' => 'evidence_01.jpg',
            'evidence_02' => 'null',
            'evidence_03' => null,
            'status' => 'pending',
            'created_at' => '2017-03-28',
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

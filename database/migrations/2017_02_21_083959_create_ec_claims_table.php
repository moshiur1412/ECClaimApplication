<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEcClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ec_claims', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assessment_id');
            $table->integer('user_id');
            $table->string('claim_criteria');
            $table->string('note');
            $table->string('evidence_01');
            $table->string('evidence_02')->nullable();
            $table->string('evidence_03')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ec_claims');
    }
}

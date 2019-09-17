<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssessmentsTable extends Migration
{

    public function up() {
        Schema::create('assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('deadline');
            $table->integer('subject_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('assessments');
    }
}

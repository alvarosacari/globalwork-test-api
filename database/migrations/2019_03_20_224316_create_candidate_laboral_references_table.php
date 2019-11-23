<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateLaboralReferencesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('candidate_laboral_references', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('contact_name');
            $table->date('start_at');
            $table->date('leave_at');
            $table->bigInteger('candidate_id')->unsigned();
            $table->foreign('candidate_id')->references('id')->on('candidates');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('candidate_laboral_references');
    }
}

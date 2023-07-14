<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('waiting_lab_id');
            $table->unsignedBigInteger('sub_analysis_id');
            $table->unsignedBigInteger('main_analysis_id');
            $table->unsignedBigInteger('patient_id');
            $table->longText('result');
            $table->enum('delayed',[0,1])->nullable();
            $table->string('classification')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('patient_id')
                  ->references('id')
                  ->on('patients');

            $table->foreign('sub_analysis_id')
                  ->references('id')
                  ->on('sub_analysis');

            $table->foreign('waiting_lab_id')
                  ->references('id')
                  ->on('waiting_labs');
            $table->foreign('main_analysis_id')
                  ->references('id')
                  ->on('main_analysis');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}

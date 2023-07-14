<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalMainAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_main_analysis', function (Blueprint $table) {
            $table->primary(['main_analysis_id','hospital_id']);
            $table->unsignedBigInteger('main_analysis_id');
            $table->unsignedBigInteger('hospital_id');
            $table->double('price')->default(0);

            $table->foreign('main_analysis_id')
                ->references('id')
                ->on('main_analysis')
                ->onDelete('cascade');

            $table->foreign('hospital_id')
                ->references('id')
                ->on('hospitals')
                ->onDelete('cascade');

            
                
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_main_analysis');
    }
}

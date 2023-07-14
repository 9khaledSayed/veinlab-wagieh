<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoryMainAnalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratory_main_analysis', function (Blueprint $table) {
            $table->primary(['main_analysis_id','laboratory_id']);
            $table->unsignedBigInteger('main_analysis_id');
            $table->unsignedBigInteger('laboratory_id');
            $table->double('selling_price')->default(0);
            $table->double('cost_price')->default(0);

            $table->foreign('main_analysis_id')
                ->references('id')
                ->on('main_analysis')
                ->onDelete('cascade');

            $table->foreign('laboratory_id')
                ->references('id')
                ->on('laboratories')
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
        Schema::dropIfExists('laboratory_main_analysis');
    }
}

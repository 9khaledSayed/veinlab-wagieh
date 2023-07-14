<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('price');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->enum('status',['active','inactive']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('package_main_analyze', function (Blueprint $table) {
            $table->primary(['main_analysis_id','package_id']);
            $table->unsignedBigInteger('main_analysis_id');
            $table->unsignedBigInteger('package_id');

            $table->foreign('main_analysis_id')
                ->references('id')
                ->on('main_analysis')
                ->onDelete('cascade');

            $table->foreign('package_id')
                ->references('id')
                ->on('packages')
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
        Schema::dropIfExists('packages');
    }
}

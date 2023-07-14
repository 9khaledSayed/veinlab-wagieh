<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_ranges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sub_analysis_id');
            $table->string('from');
            $table->string('to');
            $table->string('gender');
            $table->enum('type',\App\Enums\NormalRangeType::values())->nullable();
            $table->longText('value');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('sub_analysis_id')
                ->references('id')
                ->on('sub_analysis')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('normal_ranges');
    }
}

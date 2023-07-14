<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en')->nullable();
            $table->string('id_number')->unique();
            $table->string('phone');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('gender')->comment('Go To App\Enums\GenderType To Get Values');
            $table->unsignedBigInteger('nationality_id');
            $table->string('age');
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('diseases')->nullable();
            $table->string('visit_number')->nullable();
            $table->string('device_token')->nullable();
            $table->integer('total_points_count')->default(0);


            $table->foreign('nationality_id')->references('id')->on('nationalities')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('patients');
    }
}

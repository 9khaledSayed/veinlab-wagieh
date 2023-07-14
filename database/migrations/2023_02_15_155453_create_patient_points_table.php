<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('patients');
            $table->foreignId('another_patient_id')->nullable()->constrained('patients');
            $table->foreignId('invoice_id')->nullable()->constrained('invoices');
            $table->integer('points')->default(0);
            $table->string('key')->nullable();
            $table->enum('type', \App\Enums\PointTypes::values());
            $table->string('description')->nullable();
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
        Schema::dropIfExists('patient_points');
    }
}

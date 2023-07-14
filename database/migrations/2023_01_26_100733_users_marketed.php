<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersMarketed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

/*    tabl  user_points
        promocode id nullable // check if have promococde is marketer else patient
        user id  required
        status required
        poitents required
*/


        Schema::create('users_marketed', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promo_code_id')->comment('promo_codes.id')
                ->constrained('promo_codes')->onDelete('cascade');
            $table->foreignId('marketer_id')->constrained('marketers')->onDelete('cascade');
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->string('status')->default(\App\Enums\MarketedCodeStatus::PENDING->value);
            $table->integer('points')->default(0);

            $table->softDeletes();
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
        //
    }
}

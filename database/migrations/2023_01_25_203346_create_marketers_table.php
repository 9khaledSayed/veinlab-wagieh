<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarketersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('country');
            $table->string('city');
            $table->enum('belong_to', ['company', 'person'])->default('person');
            $table->integer('total_points_count')->default(0);
            $table->string('bank_account_title')->nullable();
            $table->string('bank_name')->nullable();
            $table->integer('swift_code')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('iban')->nullable();
            $table->integer('bank_branch_code')->nullable();
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
        Schema::dropIfExists('marketers');
    }
}

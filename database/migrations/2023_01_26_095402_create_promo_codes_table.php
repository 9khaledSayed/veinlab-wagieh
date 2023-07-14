<?php

use App\Enums\SubPromoCodeTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable()->unique();
            $table->unsignedBigInteger('main_analysis_id')->nullable();
            $table->foreignId('marketer_id')->nullable()->constrained('marketers')->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained('patients')->onDelete('cascade');
            $table->boolean('is_active')->default(1);
            $table->string('code')->unique();
            $table->integer('percentage')->nullable();
            $table->integer('fixed_value')->nullable();
            $table->integer('type');
            $table->tinyInteger('sub_type')->default(SubPromoCodeTypes::INVOICE->value);
            $table->enum('discount_type', ['percentage', 'fixed'])->default('percentage');
            $table->integer('include')->nullable();
            $table->timestamp('from')->nullable();
            $table->timestamp('to')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('main_analysis_id')
                ->references('id')
                ->on('main_analysis')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_codes');
    }
}

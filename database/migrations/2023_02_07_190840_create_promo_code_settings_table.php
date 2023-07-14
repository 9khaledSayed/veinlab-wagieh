<?php

use App\Enums\PromoCodePriorities;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promo_code_id')->nullable()->comment('promo_codes.id')
                ->constrained('promo_codes');
            $table->integer('affiliate_earning')->nullable();
            $table->enum('affiliate_earning_p', PromoCodePriorities::values())->default(PromoCodePriorities::LOW->value);
            $table->enum('affiliate_earning_type', ['percentage', 'fixed'])->nullable();

            $table->integer('user_earning')->nullable();
            $table->enum('user_earning_p', PromoCodePriorities::values())->default(PromoCodePriorities::LOW->value);
            $table->enum('user_earning_type', ['percentage', 'fixed'])->nullable();

            $table->enum('promo_type', \App\Enums\PromoCodeTypes::values())->default(\App\Enums\PromoCodeTypes::VEIN_LAB->getValue());

            $table->integer('num_points')->nullable();
            $table->decimal('eq_value')->nullable();

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
        Schema::dropIfExists('promo_code_settings');
    }
}

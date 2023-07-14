<?php

namespace App\Http\Classes\PromoCode;

use App\Models\{PromoCode, PromoCodeSetting};
use Illuminate\Database\Eloquent\Model;

interface PromoCodeInterface
{
    public function createPromoCode(array $data) : bool;
    public function deActivePromoCode(Model $model) : bool;

    public function getAll() : array;
    public function update(mixed $data, PromoCode $promoCode) : bool;
    public function destroy(Model $model) : bool;

    public function setSetting(array $data);

    public function getPromoSettingsWithDefault(PromoCode $promoCode = null) : PromoCodeSetting;

    public function setPromoCodeSetting(array $data, PromoCode $promoCode) : bool;
}

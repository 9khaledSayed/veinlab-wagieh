<?php

namespace App\Models;

use App\Enums\PromoCodeTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCodeSetting extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [

    ];
    protected $casts = ['promo_type' => PromoCodeTypes::class, 'created_at'];
    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }
}

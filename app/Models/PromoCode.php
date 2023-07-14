<?php

namespace App\Models;

use App\Enums\PromoCodeTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoCode extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $guarded = [];
    protected $casts = [
        'type' => PromoCodeTypes::class,
        'created_at',
        'from'        => 'date:Y-m-d',
        'to'          => 'date:Y-m-d',
    ];


    protected $appends = ['create_since'];

    public function getCreateSinceAttribute()
    {
        return $this->created_at?->translatedFormat('d F Y');
    }

    public function main_analysis()
    {
        return $this->belongsTo(MainAnalysis::class)->withTrashed();
    }

    public function marketer()
    {
        return $this->belongsTo(Marketer::class, 'marketer_id');
    }

    public function user()
    {
        return $this->belongsTo(Patient::class, 'user_id');
    }

    public function setting(){
        return $this->hasOne(PromoCodeSetting::class, 'promo_code_id','id');
    }
    public function getCode() : string{
        return $this->code;
    }

    public function getIsValid(): bool
    {
        if ($this->type == PromoCodeTypes::USER){
            return ($this->to == null || $this->to >= Carbon::now());
        } else if ($this->type == PromoCodeTypes::VEIN_LAB || $this->type == PromoCodeTypes::AFFILIATE) {
            return $this->to >= Carbon::now();
        } else {
            return false;
        }
    }
}

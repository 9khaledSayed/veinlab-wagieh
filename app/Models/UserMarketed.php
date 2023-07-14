<?php

namespace App\Models;

use App\Enums\MarketedCodeStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMarketed extends Model
{
    use HasFactory;

    protected $table = 'users_marketed';

    protected $fillable = ['patient_id', 'points', 'promo_code_id'];

    protected $casts = [
        'status' => MarketedCodeStatus::class
    ];
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceCompanyCategory extends Model
{
    use HasFactory,SoftDeletes;
    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];
    protected $guarded = [];

    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }
}

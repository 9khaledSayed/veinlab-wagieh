<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nationality extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $appends = ['name','image'];
    protected $casts = ['created_at'];


    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }
    public function getNameAttribute()
    {
        return $this->attributes['name_'.getLocale()];
    }

    public function getImageAttribute()
    {
        return getImagePath( $this->attributes['logo'] , 'Nationalities' ) ;
    }
}

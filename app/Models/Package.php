<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='packages';
    protected $guarded = [];
    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];

    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }
    public function mainAnalysis()
    {
        return $this->belongsToMany(MainAnalysis::class,'package_main_analyze');
    }

    public function scopeActive($q)
    {
        return $q->where('status', 'active');
    }

}

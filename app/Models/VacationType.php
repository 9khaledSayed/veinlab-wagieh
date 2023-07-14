<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationType extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'vacation_types';
    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];

    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }
}

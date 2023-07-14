<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllowanceType extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = ['created_at', 'updated_at' => 'date:Y-M-D'];

    protected $appends = ['create_since'];


    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }
}

<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];
    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];

    protected $appends = ['create_since'];


    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }
}

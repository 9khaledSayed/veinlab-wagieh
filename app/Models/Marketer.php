<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketer extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = ['created_at'];

    protected $appends = ['create_since'];

    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    public function getInfo() : string
    {
        return $this->name . ' - ' . $this->email;
    }

    public function points()
    {
        return $this->hasMany(
            UserMarketed::class,
            'marketer_id',
        );
    }
}

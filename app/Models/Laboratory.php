<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Laboratory extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $casts = ['created_at'  => 'date:Y-m-d  h:i a', 'updated_at' => 'date:Y-m-d  h:i a'];

    protected $appends = ['create_since'];


    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function mainAnalysis()
    {
        return $this->belongsToMany(MainAnalysis::class,'laboratory_main_analysis')
            ->withPivot(['selling_price','cost_price']);
    }
}

<?php

namespace App\Models;

use App\Http\Scopes\WithoutDefaultRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;


class Role extends Model
{
    use HasFactory;

    protected $guarded = ['abilities'];
    protected $appends = ['name'];
    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];
    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }
    protected static function booted()
    {
        static::addGlobalScope(new WithoutDefaultRole());
    }

    public function getNameAttribute()
    {
        return $this->attributes[ 'name_' . getLocale() ];
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function abilities()
    {
        return $this->belongsToMany(Ability::class);
    }
}

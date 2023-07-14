<?php

namespace App\Models;

use App\Enums\EmployeeType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = ['roles'];
    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];

    protected $appends = ['create_since'];


    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function assignRole($role)
    {
        return $this->roles()->save($role);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->where('id','!=',2)->withTimestamps();
    }

    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

//    public function scopeMarketers($query){
//        return $query->where('type' , EmployeeType::MARKETER->value);
//    }

    public function getInfo() : string
    {
        return $this->name . ' - ' . $this->email;
    }




}

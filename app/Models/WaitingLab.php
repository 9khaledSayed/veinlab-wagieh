<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WaitingLab extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d  h:i a'];

    protected $appends = ['create_since'];
    
    public function getCreateSinceAttribute()
    {
        return $this->created_at?->diffForHumans();
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function mainAnalysis()
    {
        return $this->belongsTo(MainAnalysis::class);
    }


    public function invoice (){
        return $this->belongsTo(Invoice::class,'invoice_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class);

    }

    public function notes (){
        return $this->hasOne(Note::class);
    }



    ////////////////////////////////////////////////////////////serialize/////////////////////////////////////////////

      public function setHighSensitiveToAttribute($value)
      {
          if (isset($value)){
              $this->attributes['high_sensitive_to'] = serialize($value);
          }
      }
      public function setModerateSensitiveToAttribute($value)
      {
          if (isset($value)){
              $this->attributes['moderate_sensitive_to'] = serialize($value);
          }
      }
      public function setResistantToAttribute($value)
      {
          if (isset($value)){
              $this->attributes['resistant_to'] = serialize($value);
          }
      }

      public function getHighSensitiveToAttribute()
      {
          if (isset($this->attributes['high_sensitive_to'])){
              return unserialize($this->attributes['high_sensitive_to']);
          }
          return [];
      }
      public function getModerateSensitiveToAttribute($value)
      {
          if (isset($this->attributes['moderate_sensitive_to'])){
              return unserialize($this->attributes['moderate_sensitive_to']);
          }
          return [];
      }
      public function getResistantToAttribute($value)
      {
          if (isset($this->attributes['resistant_to'])){
              return unserialize($this->attributes['resistant_to']);
          }
          return [];
      }
    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PatientPoint extends Model
{
    use HasFactory;

    protected $fillable = ['points', 'key', 'description'];

    protected $table = 'patient_points';
}

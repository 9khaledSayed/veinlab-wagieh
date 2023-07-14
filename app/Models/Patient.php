<?php

namespace App\Models;

use Carbon\Carbon;
use GeniusTS\HijriDate\Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Schema\Builder;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Http;

class Patient extends Model
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $guarded = [];
    public $appends = ['AllPendingWaitingLab', 'AllFinishedWaitingLab', 'AllWaitingLab'];
    protected $casts = ['created_at', 'updated_at' => 'date:Y-m-d h:i a'];

    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class, 'nationality_id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }


    public function getNationalityLabelAttribute()
    {
        return Nationality::withTrashed()->find($this->nationality_id)->label;
    }

    public function points(){
        return $this->hasMany(PatientPoint::class, 'user_id');
    }

    public function waitingLabs(){
        return $this->hasMany(WaitingLab::class, 'patient_id');
    }

    public function promoCode() : HasMany {
        return $this->hasMany(PromoCode::class, 'user_id');
    }

    public function mainAnalysis()
    {
        return $this->hasManyThrough(MainAnalysis::class,WaitingLab::class, 'main_analysis_id','id','id','id');
    }

    public function scopeHasPoints($query){
//        return $query->wh('points')
    }

    public function getAllFinishedWaitingLabAttribute()
    {
        return $this->waitingLabs->where('status',2)->count() ;
    }

    public function getAllWaitingLabAttribute()
    {
        return $this->waitingLabs->count() ;

    }

    public function getAllPendingWaitingLabAttribute()
    {
        return $this->waitingLabs->where('status',1)->count() ;
    }


    public function getLabel()
    {
        return (getLocale() == 'ar'? $this->name_ar : $this->name_en) .  ' - ' . $this->email . ' - '. $this->phone ;
    }

    public function getFullNameAttribute()
    {
        return (getLocale() == 'ar'? $this->name_ar : $this->name_en);
    }

    /**
     * @return mixed
     */
    public function getAgeCalculationAttribute(): mixed
    {
        $date = explode("-", $this->age);
        if (count($date) == 1) {
            return $this->age;
        }
        $todayHijri = Date::today()->format('o');
        $YearMeladi = Carbon::now()->format('Y');
        if (strlen($date[0]) == 4) {
            $date = array_reverse($date);
        }

        if ($date[2] < 1800) {
            return $todayHijri - $date[2];
        } else {
            return $YearMeladi - $date[2];
        }
    }

    public function getFullPhoneAttribute() {
        return '966' . substr($this->attributes['phone'], 3);
    }

    /*
     * Send a message to the patient after monitoring the invoice on WhatsApp
     */
    public function sendWhatsappMessage($message)
    {
        $response = Http::get("https://hiwhats.com/API/send" , [
            'mobile'     => config('services.hiWhatsapp.sender_mobile'),
            'password'   => config('services.hiWhatsapp.sender_password'),
            'instanceid' => config('services.hiWhatsapp.sender_instanceID'),
            'message'    => $message,
            'numbers'    => $this->full_phone,
            'type'       => 1,
            'json'       => 1,
        ]);
        return \GuzzleHttp\json_decode($response->body());
    }

    /*
     * Send a file to the patient after monitoring the invoice on WhatsApp
     */
    public function sendWhatsappFile($fileUrl)
    {
        $response = Http::get("https://hiwhats.com/API/send" , [
            'mobile'     => config('services.hiWhatsapp.sender_mobile'),
            'password'   => config('services.hiWhatsapp.sender_password'),
            'instanceid' => config('services.hiWhatsapp.sender_instanceID'),
            'message'    => 'test',
            'numbers'    => $this->full_phone,
            'type'       => 2,
            'fileurl'    => $fileUrl,
            'json'       => 1,
        ]);
        return \GuzzleHttp\json_decode($response->body());
    }


}

<?php

namespace App\Notifications;

use App\Models\Patient;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResultReady extends Notification
{
    use Queueable;

    public $analysis_url;
    public $email;
    public $patient_name ;
    public $title;
    public $date;
    public $icon;
    public $class;
    public $url;
    public $channels;

    /**
     * ResultReady constructor.
     * @param Patient  $patient
     * @param          $invoiceId
     * @param string[] $channels
     */
    public function __construct(Patient $patient, $invoiceId, $channels = ['mail', 'database'])
    {
        $this->analysis_url  = route('dashboard.results.show', $invoiceId);
        $this->email         = $patient->email;
        $this->patient_name  = $patient->name;
        $this->title         = __('Your analysis results have been completed');
        $this->icon          = 'fas fa-file-invoice';
        $this->class         = 'success';
        $this->url           = route('dashboard.results.show', $invoiceId);
        $this->channels      = $channels;
    }

    /**
     * @param $notifiable
     * @return string[]
     */
    public function via($notifiable)
    {
        return $this->channels;
    }

    /**
     * @param $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        $viewData=  [
            'patient_name' => $this->patient_name,
            'analysis_url' => $this->analysis_url
        ];

        return (new MailMessage)
            ->view('mails.result', $viewData);
    }

    /**
     * @param $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => $this->title,
            'date'  => $this->date,
            'icon'  => $this->icon,
            'class' => $this->class,
            'url'   => $this->url,
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WaitingLabNotification extends Notification
{
    use Queueable;

    public $title;
    public $date;
    public $icon;
    public $class;
    public $url;

    /**
     * WaitingLabNotification constructor.
     * @param array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Translation\Translator|string|null $title
     * @param string                                                                                                      $icon
     * @param string                                                                                                      $class
     * @param string                                                                                                      $url
     */
    public function __construct($title = "__('You have new tests in the laboratory')", $icon = 'fas fa-flask', $class = "success", $url = "/dashboard/waiting-labs")
    {
        $this->title = $title;
        $this->icon  = $icon;
        $this->class = $class;
        $this->url   = $url;
    }

    /**
     * @param $notifiable
     * @return string[]
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * @param $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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

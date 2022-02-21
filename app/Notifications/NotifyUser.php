<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data = null)
    {
        $this->data = $data;
    }

    public function via($notifiable)
    {
        //     return ['mail','database'];
        return ['database'];

    }
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //         ->name($this->offerData['name'])
    //         ->line($this->offerData['body'])
    //         ->action($this->offerData['offerText'], $this->offerData['offerUrl'])
    //         ->line($this->offerData['thanks']);
    // }
    public function toArray($notifiable)
    {

        return [
            'title' => $this->data->title,
            'body' => $this->data->body,
        ];
    }
}

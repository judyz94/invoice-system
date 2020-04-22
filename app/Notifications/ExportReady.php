<?php

namespace App\Notifications;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Notifiable;

class ExportReady extends Notification
{
    use Queueable;

    private $since_date, $until_date, $file;

    /**
     * Create a new notification instance.
     *
     * @param $type
     * @param $since_date
     * @param $until_date
     * @param $file
     */
    public function __construct($since_date, $until_date, $file)
    {
        //$this->type = $type;
        $this->since_date = $since_date;
        $this->until_date = $until_date;
        $this->file = $file;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    /*public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }*/

    public function toDatabase($notifiable)
    {
        return [
            //'type' => $this->type,
            'since_date' => $this->since_date,
            'until_date' => $this->until_date,
            'file' => $this->file,
            //'post' => Post::find($this->comment->post_id),
            'user' => User::find([
                $this->since_date->user_id,
                $this->until_date->user_id]),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            /*//'type' => $this->type,
            'since_date' => $this->since_date,
           'until_date' => $this->until_date,
            'file' => $this->file*/
        ];
    }

}


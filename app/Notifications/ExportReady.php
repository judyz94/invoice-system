<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ExportReady extends Notification
{
    use Queueable;

    private $since_date;
    private $file;
    private $until_date;

    /**
     * Create a new notification instance.
     *
     * @param $since_date
     * @param $until_date
     * @param $file
     */
    public function __construct($since_date, $until_date, $file)
    {
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

    /*public function toDatabase($notifiable)
    {
        return [
            'since_date' => $this->since_date,
            'until_date' => $this->until_date,
            'file' => $this->file,
            //'post' => Post::find($this->comment->post_id),
            'user' => User::find([
                $this->since_date->user_id,
                $this->until_date->user_id]),
        ];
    }*/

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'since_date' => $this->since_date,
            'until_date' => $this->until_date,
            'file' => $this->file
        ];
    }

}


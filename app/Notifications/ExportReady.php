<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class ExportReady extends Notification implements ShouldQueue
{
    use Queueable;

    private $since_date, $until_date, $file;

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


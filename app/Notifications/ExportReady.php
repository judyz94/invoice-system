<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ExportReady extends Notification
{
    use Queueable;

    private $sinceDate;
    private $file;
    private $untilDate;

    /**
     * Create a new notification instance.
     *
     * @param $sinceDate
     * @param $untilDate
     * @param $file
     */
    public function __construct($sinceDate, $untilDate, $file)
    {
        $this->sinceDate = $sinceDate;
        $this->untilDate = $untilDate;
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
            'since_date' => $this->sinceDate,
            'until_date' => $this->untilDate,
            'file' => $this->file
        ];
    }

}


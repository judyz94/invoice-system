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
    private $type;

    /**
     * Create a new notification instance.
     *
     * @param $type
     * @param $sinceDate
     * @param $untilDate
     * @param $file
     */
    public function __construct($type, $sinceDate, $untilDate, $file)
    {
        $this->type = $type;
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
            'type' => $this->type,
            'sinceDate' => $this->sinceDate,
            'untilDate' => $this->untilDate,
            'file' => $this->file
        ];
    }
}


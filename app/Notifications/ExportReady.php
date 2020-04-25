<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ExportReady extends Notification
{
    use Queueable;

    private $sinceDate;
    private $untilDate;
    private $type;
    private $extension;
    public $name;
    public $url;

    /**
     * Create a new notification instance.
     *
     * @param $type
     * @param $sinceDate
     * @param $untilDate
     * @param $extension
     * @param $name
     * @param $url
     */
    public function __construct($type, $sinceDate, $untilDate, $extension, $name, $url)
    {
        $this->type = $type;
        $this->sinceDate = $sinceDate;
        $this->untilDate = $untilDate;
        $this->extension = $extension;
        $this->name = $name;
        $this->url = $url;
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
            'extension' => $this->extension,
            'name' => $this->name,
            'url' => $this->url
        ];
    }
}


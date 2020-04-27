<?php

namespace App\Jobs;

use App\Notifications\ExportReady;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyUserOfCompletedExport implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public $user;
    private $sinceDate;
    private $untilDate;
    private $type;
    private $extension;
    public $name;
    public $url;

    /**
     * NotifyUserOfCompletedExport constructor.
     * @param mixed $user
     * @param $type
     * @param $sinceDate
     * @param $untilDate
     * @param $extension
     * @param $name
     * @param $url
     */
    public function __construct(User $user, $type, $sinceDate, $untilDate, $extension, $name, $url)
    {
        $this->user = $user;
        $this->type = $type;
        $this->sinceDate = $sinceDate;
        $this->untilDate = $untilDate;
        $this->extension = $extension;
        $this->name = $name;
        $this->url = $url;
    }

    public function handle()
    {
        $this->user->notify(new ExportReady(
            $this->type,
            $this->sinceDate,
            $this->untilDate,
            $this->extension,
            $this->name,
            $this->url
        ));
    }
}


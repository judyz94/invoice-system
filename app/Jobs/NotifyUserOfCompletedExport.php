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
    public $file;

    /**
     * NotifyUserOfCompletedExport constructor.
     * @param mixed $user
     * @param $sinceDate
     * @param $untilDate
     * @param $file
     */
    public function __construct(User $user, $sinceDate, $untilDate, $file)
    {
        $this->user = $user;
        $this->sinceDate = $sinceDate;
        $this->untilDate = $untilDate;
        $this->file = $file;
    }

    public function handle()
    {
        $this->user->notify(new ExportReady(
            $this->sinceDate,
            $this->untilDate,
            $this->file
        ));
    }
}


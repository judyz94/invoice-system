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
    public $since_date;
    public $until_date;
    public $file;

    /**
     * NotifyUserOfCompletedExport constructor.
     * @param mixed $user
     * @param $since_date
     * @param $until_date
     * @param $file
     */
    public function __construct(User $user, $since_date, $until_date, $file)
    {
        $this->user = $user;
        $this->since_date = $since_date;
        $this->until_date = $until_date;
        $this->file = $file;
    }

    public function handle()
    {
        $this->user->notify(new ExportReady(
            $this->since_date,
            $this->until_date,
            $this->file
        ));
    }
}


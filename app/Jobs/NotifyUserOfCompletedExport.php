<?php


namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NotifyUserOfCompletedExport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user, $since_date, $until_date;

    /**
     * NotifyUserOfCompletedExport constructor.
     * @param mixed $user
     * @param $since_date
     * @param $until_date
     */
    public function __construct(User $user, $since_date, $until_date)
    {
        $this->user = $user;
        $this->since_date = $since_date;
        $this->until_date = $until_date;
    }

    public function handle()
    {
        $this->user->notify(new ExportReady(
            $this->since_date,
            $this->until_date
        ));
    }
}


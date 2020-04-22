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
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user, $since_date, $until_date, $file;

    /**
     * NotifyUserOfCompletedExport constructor.
     * @param mixed $user
     * @param $type
     * @param $since_date
     * @param $until_date
     * @param $file
     */
    public function __construct(User $user, $since_date, $until_date, $file)
    {
        $this->user = $user;
        //$this->type = $type;
        $this->since_date = $since_date;
        $this->until_date = $until_date;
        $this->file = $file;
    }

    public function handle()
    {
        $this->user->notify(new ExportReady(
            //$this->type,
            $this->since_date,
            $this->until_date,
            $this->file
        ));
    }
}


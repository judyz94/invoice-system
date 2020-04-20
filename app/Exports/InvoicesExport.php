<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class InvoicesExport implements FromQuery, ShouldQueue
{
    use Exportable, InteractsWithQueue, Queueable;

    /**
     * @var string
     */
    private $since_date, $until_date;

    public function __construct(string $since_date, string $until_date)
    {
        $this->since_date = $since_date;
        $this->until_date = $until_date;
    }

    public function query()
    {
        return Invoice::query()
            ->whereDate('created_at',">=", $this->since_date)
            ->whereDate('created_at',  '<=', $this->until_date);
    }
}


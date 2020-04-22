<?php

namespace App\Jobs;

use App\Exports\InvoicesExport;
use App\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportReports implements ShouldQueue,FromQuery, WithHeadings
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Exportable;
    /**
     * @var string
     */
    protected $since_date, $until_date;

    /**
     * Create a new job instance.
     *
     * @param string $since_date
     * @param string $until_date
     */
    public function __construct(string $since_date, string $until_date)
    {
        $this->since_date = $since_date;
        $this->until_date = $until_date;
    }

    /**
     * Execute the job.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function handle(Request $request)
    {
        $this->user->notify(new ExportReady());
        /*$since_date = $request->get('since_date');
        $until_date = $request->get('until_date');

        return(new ExportReports($since_date, $until_date))
            ->download('ReportPetFriends.xls');*/
    }

    /**
     * @inheritDoc
     */
    public function query()
    {
        return Invoice::query()
            ->whereDate('created_at',">=", $this->since_date)
            ->whereDate('created_at',  '<=', $this->until_date);
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return [
            'ID',
            'Code',
            'Expedition Date',
            'Due Date',
            'Receipt Date',
            'Sale description',
            'Total',
            'VAT',
            'Total with VAT',
            'State ID',
            'Seller ID',
            'Customer ID',
            'User ID',
            'Created at',
            'Updated at'
        ];
    }
}


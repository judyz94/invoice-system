<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoicesExport implements
    FromQuery,
    WithHeadings,
    ShouldQueue
{
    use Exportable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    private $since_date;
    private $until_date;

    /**
     * @var string
     */
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


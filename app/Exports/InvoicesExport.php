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

    private $sinceDate;
    private $untilDate;

    /**
     *
     * @param string $sinceDate
     * @param string $untilDate
     */
    public function __construct(string $sinceDate, string $untilDate)
    {
        $this->sinceDate = $sinceDate;
        $this->untilDate = $untilDate;
    }

    public function query()
    {
        return Invoice::query()
            ->whereDate('created_at',">=", $this->sinceDate)
            ->whereDate('created_at',  '<=', $this->untilDate);
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

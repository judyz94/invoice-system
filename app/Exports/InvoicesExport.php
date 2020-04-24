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

    private $type;
    private $sinceDate;
    private $untilDate;
    private $extension;

    /**
     *
     * @param string $type
     * @param string $sinceDate
     * @param string $untilDate
     * @param string $extension
     */
    public function __construct(string $type, string $sinceDate, string $untilDate, string $extension)
    {
        $this->type = $type;
        $this->sinceDate = $sinceDate;
        $this->untilDate = $untilDate;
        $this->extension = $extension;
    }

    public function query()
    {
        return Invoice::query()
            ->whereDate($this->type,">=", $this->sinceDate)
            ->whereDate($this->type,  '<=', $this->untilDate);
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

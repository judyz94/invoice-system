<?php

namespace App\Exports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoicesExportAll implements
    FromQuery,
    WithHeadings
{
    use Exportable;

    public function query()
    {
        return Invoice::query();
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


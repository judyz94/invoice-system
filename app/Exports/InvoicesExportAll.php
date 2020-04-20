<?php

namespace App\Exports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class InvoicesExportAll implements FromQuery
{
    use Exportable;

    public function query()
    {
        return Invoice::query();
    }
}


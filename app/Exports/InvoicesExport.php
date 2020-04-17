<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class InvoicesExport implements WithMultipleSheets
{
    use Exportable;

    private $date;

    public function forDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function sheets(): array
    {
        // TODO: Implement sheets() method.
    }
}


<?php

namespace App\Imports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\{Importable, ToModel, WithHeadingRow};

class InvoicesImport implements ToModel, WithHeadingRow
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([
            'code' => $row['code'],
            'expedition_date' => $row['expedition_date'],
            'due_date' => $row['due_date'],
            'receipt_date' => $row['receipt_date'],
            'sale_description' => $row['sale_description'],
            'total' => $row['total'],
            'vat' => $row['vat'],
            'total_with_vat' => $row['total_with_vat'],
            'seller_id' => $row['seller_id'],
            'customer_id' => $row['customer_id'],
            'status' => $row['status'],
            'user_id' => $row['user_id'],
            'is_active' => ($row['active'] == 'YES') ? 1 : 0,
        ]);
    }
}

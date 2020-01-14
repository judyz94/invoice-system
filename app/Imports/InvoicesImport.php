<?php

namespace App\Imports;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvoicesImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return Model|null
     * @throws \Exception
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
        ]);
    }

    public function rules(): array
    {
        return [
            'expedition_date' => 'required',
            'due_date' => 'required',
            'receipt_date' => 'required',
            'sale_description' => 'required|min:4',
            'total' => 'required',
            'vat' => 'required',
            'total_with_vat' => 'required',
            'seller_id' => 'required',
            'customer_id' => 'required',
            'status' => 'required',
            'user_id' => 'required',
        ];
    }
}


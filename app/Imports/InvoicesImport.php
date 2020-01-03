<?php

namespace App\Imports;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\withValidation;


class InvoicesImport implements ToModel, WithHeadingRow, withValidation
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
            'expedition_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['expedition_date']),
            'due_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['due_date']),
            'receipt_date' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['receipt_date']),
            'sale_description' => $row['sale_description'],
            'total' => $row['total'],
            'vat' => $row['vat'],
            'total_with_vat' => $row['total_with_vat'],
            'seller_id' => $row['seller_id'],
            'customer_id' => $row['customer_id'],
            'status' => $row['status'],
            'user_id' => $row['user_id'],
            //'is_active' => ($row['active'] == 'YES') ? 1 : 0,
        ]);
    }

    public function rules(): array
    {
        return [
            'expedition_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:expedition_date',
            'receipt_date' => 'required|date|after_or_equal:expedition_date',
            'seller_id' => 'required|numeric|exists:sellers,id',
            'sale_description' => 'required|min:4',
            'customer_id' => 'required',
            'status' => 'required',
        ];
    }
}

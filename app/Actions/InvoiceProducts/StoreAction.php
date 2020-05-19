<?php

namespace App\Actions\InvoiceProducts;

use App\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StoreAction extends Action
{
    public function storeModel(Model $invoice, Request $request): Model
    {
        $price = $request->input('price');
        $quantity = $request->input('quantity');
        $total = $price * $quantity;
        $vat = $total * 0.19;

        $invoice->products()->attach($request->input('product_id'), [
            'price' => $price,
            'quantity' => $quantity,
        ]);

        $invoice->vat += $vat;
        $invoice->total += $total;
        $invoice->total_with_vat += $total + $vat;

        $invoice->save();

        return $invoice;
    }
}


<?php

namespace App\Actions\Invoices;

use App\Actions\Action;
use App\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StoreAction extends Action
{
    public function storeModel(Model $invoice, Request $request): Model
    {
        $invoice->id = $request->input('id');
        $invoice->expedition_date = $request->input('expedition_date');
        $invoice->due_date = $request->input('due_date');
        $invoice->seller_id = $request->input('seller_id');
        $invoice->sale_description = $request->input('sale_description');
        $invoice->customer_id = $request->input('customer_id');
        $invoice->state_id = $request->input('state_id');
        $invoice->user_id = $request->input('user_id');

        $invoice->save();

        $invoice->update([
            'code' => 'A' . str_pad($invoice->id, 4, 0, STR_PAD_LEFT),
        ]);

        return $invoice;
    }
}


<?php

namespace App\Actions\InvoiceProducts;

use App\Actions\Action;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateAction extends Action
{
    public function storeModel(Model $invoice, Request $request): Model
    {
        $product = Product::all();

        $product = $invoice->products()->findOrFail($product);

        $invoice->products()->updateExistingPivot($product->id, $request->validated());

        return $invoice;
    }
}


<?php

namespace App\Actions\Products;

use App\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateAction extends Action
{
    public function storeModel(Model $product, Request $request): Model
    {
        $product->name = $request->input('name');
        $product->unit_price = $request->input('unit_price');

        $product->save();

        return $product;
    }
}


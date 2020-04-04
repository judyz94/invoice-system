<?php

namespace App\Actions\Sellers;

use App\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateAction extends Action
{
    public function storeModel(Model $seller, Request $request): Model
    {
        $seller->name = $request->input('name');
        $seller->last_name = $request->input('last_name');
        $seller->full_name = $seller->name . ' ' . $seller->last_name;
        $seller->document_type = $request->input('document_type');
        $seller->document = $request->input('document');
        $seller->email = $request->input('email');
        $seller->phone = $request->input('phone');
        $seller->city_id = $request->input('city_id');
        $seller->address = $request->input('address');

        $seller->save();

        return $seller;
    }
}


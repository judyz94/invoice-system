<?php

namespace App\Actions\Customers;

use App\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateAction extends Action
{
    public function storeModel(Model $customer, Request $request): Model
    {
        $customer->name = $request->input('name');
        $customer->last_name = $request->input('last_name');
        $customer->full_name = $customer->name . ' ' . $customer->last_name;
        $customer->document_type = $request->input('document_type');
        $customer->document = $request->input('document');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->city_id = $request->input('city_id');
        $customer->address = $request->input('address');

        $customer->save();

        return $customer;
    }
}


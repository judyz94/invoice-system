<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function products() {
        return $this->belongsToMany(Product::class, 'invoices_products')
            ->using('App\InvoiceProduct')
            ->withPivot([
                'price',
                'quantity',
            ]);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function seller() {
        return $this->belongsTo(Seller::class);
    }
}

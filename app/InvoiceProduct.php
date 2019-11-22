<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class InvoiceProduct extends Model
{
    public function invoices() {
        return $this->belongsToMany(Invoice::class);
    }
    public function products() {
        return $this->belongsToMany(Product::class);
    }
}

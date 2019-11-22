<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function invoicesProducts() {
        return $this->hasMany(InvoiceProduct::class);
    }
    public function customer() {
        return $this->belongsTo(Customer::class);
    }
    public function seller() {
        return $this->belongsTo(Seller::class);
    }
}

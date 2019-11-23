<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'invoices_products')
            ->using('App\InvoiceProduct')
            ->withPivot([
                'price',
                'quantity',
            ]);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }
}

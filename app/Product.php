<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class,'invoice_product', 'product_id', 'invoice_id')
            ->withPivot(
                'price',
                'quantity');
    }
}

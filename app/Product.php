<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class, 'invoices_products')
            ->using('App\Invoice')
            ->withPivot([
                'price',
                'quantity',
            ]);
    }
}

<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seller extends Model
{
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}

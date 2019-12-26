<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seller extends Model
{
    protected $fillable = ['name', 'document', 'email', 'phone', 'city_id', 'address'];

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}


<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    protected $fillable = ['name'];

    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    public function sellers(): HasMany
    {
        return $this->hasMany(Seller::class);
    }
}


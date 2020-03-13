<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    protected $fillable = ['name'];

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
}


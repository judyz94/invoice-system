<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
    public function city() {
        return $this->belongsTo(City::class);
    }
}

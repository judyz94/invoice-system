<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'document', 'email', 'phone', 'city_id', 'address'];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }
}

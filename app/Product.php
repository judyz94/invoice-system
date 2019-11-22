<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function invoicesProducts() {
        return $this->hasMany(InvoicesProducts::class);
    }
}

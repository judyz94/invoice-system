<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    protected $fillable = ['code', 'expedition_date', 'due_date', 'receipt_date', 'seller_id', 'sale_description',
        'customer_id', 'total', 'vat', 'total_with_vat', 'state_id', 'user_id', 'created_at'];

    protected $guarded = [];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['price', 'quantity']);
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(Seller::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    public function scopeSearchFor($query, $filter, $search)
    {
        if (($filter) && ($search)) {
            return $query->where($filter, 'like', "%$search%");
        }
    }

    public function scopeExport($query, $type, $since_date, $until_date)
    {
        if ($type && $since_date && $until_date) {
            return $query->whereDate("$type", ">=", "$since_date")->whereDate("$type", "<=", "$until_date");
        }
    }
}


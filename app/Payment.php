<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = ['invoice_id', 'amount', 'status', 'date', 'message', 'requestId', 'processUrl'];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(Invoice::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'consumer_id',
        'currency_fiat',
        'currency_crypto',
        'price',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'issuer_id', 'id');
    }
}

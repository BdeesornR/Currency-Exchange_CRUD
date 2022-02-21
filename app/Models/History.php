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
        'associated_id',
        'currency_crypto',
        'quantity',
        'currency_fiat',
        'price',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

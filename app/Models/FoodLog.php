<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FoodLog extends Model
{
    protected $fillable = [
        'user_id',
        'food_id',
        'quantity',
        'consumed_at',
    ];

    protected $casts = [
        'consumed_at' => 'datetime',
    ];

    /**
     * Relasi ke tabel foods
     */
    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }

    /**
     * Relasi ke tabel users
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
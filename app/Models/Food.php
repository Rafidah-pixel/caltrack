<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = [
        'name',
        'calories',
        'protein',
        'carbs',
        'fat',
    ];

    /**
     * Relasi ke food_logs
     */
    public function logs(): HasMany
    {
        return $this->hasMany(FoodLog::class);
    }
}
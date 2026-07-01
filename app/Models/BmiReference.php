<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BmiReference extends Model
{
    protected $fillable = [
        'gender',
        'age_month',
        'minus3',
        'minus2',
        'minus1',
        'median',
        'plus1',
        'plus2',
        'plus3'
    ];
}
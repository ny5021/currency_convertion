<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Paires extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_devise',
        'to_devise',
        'value',
        'nb_converter',
    ];
}

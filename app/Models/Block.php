<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $fillable = [
        'block_index',
        'data',
        'previous_hash',
        'hash',
        'transaction_type',
        'from_address',
        'to_address',
        'amount',
        'fee',
        'description',
        'status',
        'block_height'
    ];

    protected $casts = [
        'data' => 'array',
        'amount' => 'float',
        'fee' => 'float'
    ];
}
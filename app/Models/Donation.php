<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $fillable = [
        'donor_name',
        'donor_email',
        'amount',
        'message',
        'payment_method',
        'status',
        'transaction_id',
    ];

    protected $casts = [
        'amount' => 'integer',
    ];
}

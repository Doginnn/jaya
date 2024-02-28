<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    public $timestamps = true;

    protected $fillable = [
        'status',
        'transaction_amount',
        'installments',
        'token',
        'payment_method_id',
        'notification_url',
        'created_at',
        'updated_at'
    ];
}

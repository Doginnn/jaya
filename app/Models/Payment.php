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
        'transaction_amount',
        'installments',
        'token',
        'payment_method_id',
        'payer_entity_type',
        'payer_type',
        'payer_email',
        'payer_identification_type',
        'payer_identification_number',
        'notification_url',
        'created_at',
        'updated_at',
        'status'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use App\Models\Identification;

class Payer extends Model
{
    use HasFactory;

    protected $table = 'payers';

    protected $fillable = [
        'entity_type',
        'type',
        'email'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function identification()
    {
        return $this->hasOne(Identification::class);
    }
}

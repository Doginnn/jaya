<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    use HasFactory;

    protected $table = 'payers';

    protected $fillable = [
        'entity_type',
        'type',
        'email'
    ];
}

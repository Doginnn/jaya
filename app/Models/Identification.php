<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payer;

class Identification extends Model
{
    use HasFactory;

    protected $table = 'identifications';

    protected $fillable = [
        'type',
        'number'
    ];

    public function payer()
    {
        return $this->belongsTo(Payer::class);
    }
}

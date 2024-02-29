<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payer extends Model
{
    use HasFactory;

    protected $table = 'payers';

    public $timestamps = false;

    protected $fillable = [
        'id',
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

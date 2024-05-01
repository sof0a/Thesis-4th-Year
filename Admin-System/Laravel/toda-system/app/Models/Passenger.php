<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    protected $table = 'passengers';

    protected $fillable = [
        'name', 'contact_number'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}



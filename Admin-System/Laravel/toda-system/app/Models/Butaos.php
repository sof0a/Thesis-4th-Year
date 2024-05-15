<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class butaos extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id',
        'toda_commission',
        'toda_paid',
        'toda_balance',
        'toda_payment_status',
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'tricycle_id', 'driver_id', 'passenger_id', 'date', 'fare_amount', 'landmark', 'pickup_point', 'dropoff_point', 'notes', 'status'
    ];

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

}

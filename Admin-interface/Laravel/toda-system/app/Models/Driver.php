<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{

    protected $table = 'drivers';

    protected $fillable = [
        'name', 'license_number', 'contact_number', 'plate_number', 'model'
    ];

    public function transactions()
    {
        return $this->hasMany(Passenger::class);
    }


}

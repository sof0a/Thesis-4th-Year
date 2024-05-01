<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Model
{

    protected $table = 'drivers';

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'contact_number',
        'license_number',
        'model',
        'plate_number'
    ];

    public function transactions()
    {
        return $this->hasMany(Passenger::class);
    }


}

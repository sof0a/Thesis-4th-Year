<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Driver extends Model
{

    protected $table = 'drivers';

    protected $fillable = [
        'name', 'license_number', 'contact_number', 'model', 'plate_number'
    ];

    public function transactions()
    {
        return $this->hasMany(Passenger::class);
    }


}

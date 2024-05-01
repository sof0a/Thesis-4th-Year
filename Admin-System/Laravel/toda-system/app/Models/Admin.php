<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins'; // Specify the table name if it differs from the default

    protected $fillable = [
        'name', 'email', 'password', 'contact_number'
    ]; // Specify the fillable attributes

    // Define relationships
    // public function todos()
    // {
    //     return $this->hasMany(Todo::class);
    // }

    // Define accessor and mutator methods if needed
}

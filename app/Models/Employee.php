<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mother',
        'cpf',
        'isAlive',
        'deathCause',
        'address',
        'district',
        'city',
        'state',
    ];
}

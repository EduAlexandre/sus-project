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
        'rg',
        'sus_card',
        'isAlive',
        'deathCause',
        'address',
        'district',
        'city',
        'state',
    ];

    public function diseaseEmployee(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Exams', 'employees_id');
    }
}

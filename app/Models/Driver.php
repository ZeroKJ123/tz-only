<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Driver extends Model
{
    protected $fillable = ['full_name', 'birth_date'];

    public function car(): HasOne
    {
        return $this->hasOne(Car::class);
    }
}

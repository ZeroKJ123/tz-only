<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    protected $fillable = [
        'model',
        'registration_plate',
        'driver_id',
        'comfort_category_id',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function comfortCategory(): BelongsTo
    {
        return $this->belongsTo(ComfortCategory::class);
    }

    public function trips(): HasMany
    {
        return $this->hasMany(Trip::class);
    }
}

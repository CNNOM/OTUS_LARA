<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $fillable = [
        'title',
        'description',
        'details',
        'program',
        'hotels',
        'itinerary',
        'country',
        'category',
        'duration_days',
        'price',
        'image',
        'rating',
        'is_active',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean', 'duration_days' => 'integer', 'price' => 'decimal:2', 'rating' => 'decimal:1', 'hotels' => 'array', 'itinerary' => 'array'];
    }
}

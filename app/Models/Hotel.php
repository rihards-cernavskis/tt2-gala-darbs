<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'city', 'country',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //We need to have is_recommended column in the hotel table
    public function scopeRecommended($query)
    {
        return $query->where('is_recommended', true);
    }
}

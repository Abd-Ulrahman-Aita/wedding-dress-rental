<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dress extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'sizes', 'quantity', 'rental_price', 'image_url'];

    protected $casts = [
        'sizes' => 'array', // Cast sizes to array
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'dress_id', 'start_date', 'end_date'];

    public function dress()
    {
        return $this->belongsTo(Dress::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    // Relasi ke User (Owner)
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}

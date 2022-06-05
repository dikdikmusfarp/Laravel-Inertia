<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getImageUrl()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }

        return null;
    }

    public function scopeActive($query)
    {
        return $query->whereNotNull('approved_at');
    }

    public function scopePending($query)
    {
        return $query->whereNull('approved_at');
    }

    public function scopeRandomItems($query, $limit = 4)
    {
        return $query->active()->inRandomOrder()->take($limit)->get();
    }
}

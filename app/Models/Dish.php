<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'description',
        'price',
        'image',
    ];

    // Een gerecht kan in veel OrderItems voorkomen
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : 'https://via.placeholder.com/400x300?text=Geen+foto';
    }
}
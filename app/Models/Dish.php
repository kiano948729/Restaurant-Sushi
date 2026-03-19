<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'price',
        'stock',
        'discount_percentage',
        'image',
        'status',
        'rating',
        'offer_text',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    // public function orderItems()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}

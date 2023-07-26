<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function orderDetails()
    // {
    //     return $this->hasMany(OrderDetail::class);
    // }

    public function imageUrls()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function productRatings()
    {
        return $this->hasMany(ProductRating::class);
    }

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'price',
        'available',
        'onSpecial_list',
        'discount',
        'quantity',
        'desc',
        'title',
        'imageUrl',
        'special_desc',
        'onWelcomeList',
        'incrediant',
    ];
}

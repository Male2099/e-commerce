<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRating extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class);
    }

    
    
    protected $fillable = [
        'product_id',
        'user_id',
        'review', 
        'visibility',
        'rating'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'product_id',
        'code',
        'price',
        'discount',
        'forAll',
        'expire_date',
        'userable_count'
    ];
}

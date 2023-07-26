<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function currentOrder()
    {
        return $this->where('status', 'busy')->first();
    }


    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'status',
        'user_id',
        'delivery_method',
        'total',
        'cash_receive',
        'promocode',
        'order_date',
    ];
}

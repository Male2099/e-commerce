<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    protected $fillable = [
        'order_id',
        'city',
        'country',
        'state',
        'street_name',
        'street_number',
        'postalcode',
        'addtional_info',
    ];
}

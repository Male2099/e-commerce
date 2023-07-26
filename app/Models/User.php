<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * currently not include some other table such feedback, credit card, address, shop info(?)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * user has one-to-many relationship witn order table, one user order more than one time...
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    /**
     * user has one-to-many relationsip with product_rating table, one user can rate/review more than one times or more than one products
     */
    public function productRatings()
    {
        return $this->hasMany(ProductRating::class);
    }
    /**
     * @return list of product user has added, this's just incase there will be more than one admin accounts
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'tel',
        'role',
        'delivery_method',
        'remember_creditcard',
        'remember_address',
        'lastOnline',
        'email',
        'password',
        'banned',
    ];
    


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}

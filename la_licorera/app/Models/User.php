<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'addresses',
        'wallet',
        'role',
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

    /**
     * $this->atribute['id'] - int - Primary key
     * this->atribute['email'] - string - the user's email
     * this->atribute['email_verified_at'] - timestamp - when was the user's email verified as its own
     * this->atribute['password'] - string - the user's password
     * this->atribute['addresses'] - json - the list of addresses that the user has
     * this->atribute['wallet'] - int - the amount of money the user has
     * this->atribute['role'] - string - if the user is an admin or a end user
     * this->atribute['created_at'] - timestamp - when was this user created
     * this->atribute['updated_at'] - timestamp - when was this user's profile last updated
     * this->recipes - Recipes[] - the recipes a given user has uploaded
     * this->orders - Order[] - the order a given user has made
     */
    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name)
    {
        $this->attributes['name'] = $name;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getAddresses(): string
    {
        return $this->attributes['addresses'];
    }

   /*public function setAddresses(json $addresses): void
    {
        $this->attributes['addresses'];
    }*/

    // no estoy seguro de esto-------------------------------------------------------------------
    public function getAddress(string $key): string
    {
        return $this->attributes['address'];
    }
    // no estoy seguro de esto-------------------------------------------------------------------

    public function setAddress(string $address): void
    {
        $this->attributes['addresses']=json_encode($address);
    }

    public function getWallet(): int
    {
        return $this->attributes['wallet'];
    }

    public function setWallet(int $wallet): void
    {
        $this->attributes['wallet'] = $wallet;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function getRecipes(): Collection
    {
        return $this->Recipes;
    }

    public function setRecipes(Collection $Recipes)
    {
        $this->Recipes = $Recipes;
    }

    public function recipes(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }

    public function getOrder(): Collection
    {
        return $this->Orders;
    }

    public function setOrders(Collection $Orders)
    {
        $this->Orders = $Orders;
    }

    public function Orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}

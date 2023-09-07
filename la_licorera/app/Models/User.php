<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    public function getId():int
    {
        return $this->attributes['id'];
    }

    
    public function getName():string
    {
        return $this->attributes['name'];
    }

    
    public function getEmail():string
    {
        return $this->attributes['email'];
    }

    
    public function getPassword():string
    {
        return $this->attributes['password'];
    }

    public function getAddresses():json
    {
        return $this->attributes['addresses'];
    }

    public function getAddress(string $key):string
    {
        return json_decode($key,true);
    }

    
    public function getWallet():int
    {
        return $this->attributes['wallet'];
    }

    public function getRole():string
    {
        return $this->attributes['role'];
    }

        
    public function getCreatedAt():string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt():string
    {
        return $this->attributes['updated_at'];
    }


    public function setName(string $name)
    {
        $this->attributes['name']=$name;
    }

    
    public function setEmail(string $email):void
    {
        $this->attributes['email']=$email;
    }

    
    public function setPassword(string $password):void
    {
        $this->attributes['password']=$password;
    }

    public function setAddresses(json $addresses):void
    {
        $this->attributes['addresses'];
    }

    public function setAddress(json $address):void
    {
        json_encode($address);
    }
    
    public function setWallet(int $wallet):void{
        $this->attributes['wallet']=$wallet;
    }

    public function setRole(string $role):void{
        $this->attributes['role']=$role;
    }
}

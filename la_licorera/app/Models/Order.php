<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    public function getId():int
    {
        return $this->attributes['id'];
    }

    
    public function getState():string
    {
        return $this->attributes['state'];
    }

    public function getDeliveryDate():string
    {
        return $this->attributes['delivery_date'];
    } 
    
    public function getUserId():int
    {
        return $this->attributes['user_id'];
    }

    public function getUser():int
    {
        return $this->User;
    }

    public function getCreatedAt():string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt():string
    {
        return $this->attributes['updated_at'];
    }

    public function setState(string $state):void
    {
        $this->attributes['state']=$state;
    }

    
    public function setDeliveryDate(string $ddate):void
    {
        $this->attributes['delivery_date']=$ddate;
    } 
    
    public function setUserId(int $uid):void
    {
        $this->attributes['user_id']=$uid;
    }

    
    public function setUser(User $user):void
    {
        $this->User=$user;
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items():HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItem():Collection
    {
        return $this->items;
    }

    public function setItems(Collection $Items)
    {
        $this->itemss=$Itemss;
    }

}

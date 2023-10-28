<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Http\Request;

class Order extends Model
{
    /**
     * $this->atribute['id'] - int - Primary key
     * this->atribute['state'] - string - what step of the delivery proces the oreder is
     * this->atribute['total'] - int - the the total value for this order
     * this->atribute['delivery_date'] - string - if it was already delivered when was it delivered
     * this->atribute['created_at'] - timestamp - when was this order created
     * this->atribute['updated_at'] - timestamp - when was this order's information last updated
     * this->atribute['user_id'] - int - the id of the user that made this order
     * this->user - User- who made this order
     * this->item - Item[] - relation between the oreder and the producte it has
     */
    public static function validate(Request $request)
    {
        $request->validate([
            'total' => 'required|numeric',
            'user_id' => 'required|exists:users,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getState(): string
    {
        return $this->attributes['state'];
    }

    public function setState(string $state): void
    {
        $this->attributes['state'] = $state;
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getDeliveryDate(): string
    {
        return $this->attributes['delivery_date'];
    }

    public function setDeliveryDate(string $ddate): void
    {
        $this->attributes['delivery_date'] = $ddate;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

        public function setUserId(int $uid): void
    {
        $this->attributes['user_id'] = $uid;
    }

    public function getUser(): User
    {
        return $this->User;
    }

    public function setUser(User $user): void
    {
        $this->User = $user;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): Collection
    {
        return $this->Items;
    }

    public function setItems(Collection $Items)
    {
        $this->Items = $Items;
    }
}

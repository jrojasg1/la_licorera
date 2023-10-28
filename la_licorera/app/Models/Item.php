<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Item extends Model
{
    /**
     * $this->atribute['id'] - int - Primary key
     * this->atribute['amount] - int - how many of this product is in the order
     * this->atribute['subtotal'] - int - the sum of the prices of the product (the value of just the products)
     * this->atribute['created_at'] - timestamp - when was this item created
     * this->atribute['updated_at'] - timestamp - when was this item's information last updated
     * this->atribute['order_id'] - int - The id of the order this item appears in
     * this->order - Order - the order this items are going in
     * this->atribute['product_id'] - int - The id of the product this item is representing
     * this->product - Product - the product this item is "representing"
     */
    public static function validate(Request $request):void
    {
        $request->validate([
            'subtotal' => 'required|numeric|gt:0',
            'amount' => 'required|numeric|gt:0',
            'product_id' => 'required|exists:products,id',
            'order_id' => 'required|exists:orders,id',
        ]);
    }





    public function setProductId(int $pid): void
    {
        $this->attributes['product_id'] = $pid;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getAmount(): int
    {
        return $this->attributes['amount'];
    }

    public function setAmount(int $amount): void
    {
        $this->attributes['amount'] = $amount;
    }

    public function getSubTotal(): int
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal(int $subtotal): void
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProductrId(): int
    {
        return $this->attributes['product_id'];
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $rid): void
    {
        $this->attributes['order_id'] = $rid;
    }

    public function getOrder(): Order
    {
        return $this->Order;
    }

    public function setOrder(order $order): void
    {
        $this->Order = $order;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

}

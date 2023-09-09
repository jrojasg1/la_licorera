<?php

namespace App\Models;


use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
            /**
     * $this->atribute['id']-int-Primary key
     * this->atribute['amount]-int-how many of this product is in the order
     * this->atribute['subtotal']-int-the sum of the prices of the product (the value of just the products)
     * this->Order-Order-the order this items are going in
     * this->Product-Product- the product this item is "representing"
     */

    public function setAmount(int $amount):void
    {
        $this->attributes['amount']=$amount;
    }
    public function setSubtotal(int $subtotal):void
    {
        $this->attributes['subtotal']=$subtotal;
    }
    public function setProductId(int $pid):void
    {
        $this->attributes['product_id']=$pid;
    }

    
    public function setProduct(Product $product):void
    {
        $this->Product=$product;
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProductrId():int
    {
        return $this->attributes['product_id'];
    }

    public function getProduct():Product
    {
        return $this->Product;
    }
    public function setOrderId(int $rid):void
    {
        $this->attributes['order_id']=$rid;
    }

    
    public function setOrder(order $order):void
    {
        $this->Order=$order;
    }

    public function order():BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrderId():int
    {
        return $this->attributes['order_id'];
    }

    public function getOrder():Order
    {
        return $this->Order;
    }
}

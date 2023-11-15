<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
        {
            $id = $this->getId();
            $name = $this->getName();
            $stock = $this->getStock();
            $price = $this->getPrice();
            return [
                'id' => $id,
                'name' => $name ,
                'stock'=>$stock,
                'price' => $price,
                'link'=>'http://127.0.0.1:8000/products/'.$id
            ];
        }
}
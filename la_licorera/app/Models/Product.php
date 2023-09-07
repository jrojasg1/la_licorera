<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function getId():int
    {
        return $this->attributes['id'];
    }

    
    public function getName():string
    {
        return $this->attributes['name'];
    }

    public function getType():string
    {
        return $this->attributes['type'];
    }

    
    public function getDescription():string
    {
        return $this->attributes['description'];
    }

    
    public function getAlcoholContent():int
    {
        return $this->attributes['alcohol_content'];
    }

    
    public function getPrice():int
    {
        return $this->attributes['price'];
    }

    public function getImage():string
    {
        return $this->attributes['image'];
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

    public function setType(string $type)
    {
        $this->attributes['type']=$type;
    }

    
    public function setDescription(string $description):void
    {
        $this->attributes['description']=$description;
    }

    
    public function setAlcoholContent(int $price):void{
        $this->attributes['price']=$price;
    }

    
    public function setImage(int $image):void{
        $this->attributes['image']=$image;
    }

}

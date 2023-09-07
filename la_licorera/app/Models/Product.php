<?php

namespace App\Models;


use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\hasMany;

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

    public function setName(string $name):void
    {
        $this->attributes['name']=$name;
    }

    public function setType(string $type):void
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

    public function ingredients():HasMany
    {
        return $this->hasMany(Ingridient::class);
    }

    public function getIngredients():Collection
    {
        return $this->ingredients;
    }

    public function setIngredients(Collection $Ingredients)
    {
        $this->ingredients=$Ingredients;
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

<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
                /**
     * $this->atribute['id']-int-Primary key
     * this->atribute['quantity]-int-how many of this product is used in the recipe
     * this->Recipe-Recipe-the recipe this items are going in
     * this->Product-Product- the product this ingridient is "representing"
     */

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
    public function setRecipeId(int $rid):void
    {
        $this->attributes['recipe_id']=$rid;
    }

    
    public function setRecipe(Recipe $recipe):void
    {
        $this->Recipe=$recipe;
    }

    public function recipe():BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function getRecipeId():int
    {
        return $this->attributes['recipe_id'];
    }

    public function getRecipe():Recipe
    {
        return $this->Recipe;
    }

    public function getQuantity():int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity):void
    {
        $this->attributes['quantity']=$quantity;
    }
}

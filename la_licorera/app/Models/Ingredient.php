<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ingredient extends Model
{
    /**
     * this->atribute['id'] - int - Primary key
     * this->atribute['quantity'] - int - how many of this product is used in the recipe
     * this->atribute['created_at'] - timestamp - when was this ingredient created
     * this->atribute['updated_at'] - timestamp - when was this ingredient's information last updated
     * this->atribute['recipe_id'] - int - The id of the recipe this ingredient is a part of
     * this->recipe - Recipe -the recipe this items are going in
     * this->atribute['product_id'] - int - The id of the recipe this ingredient is representing
     * this->product - Product - the product this ingridient is "representing"
     */
    public function setProductId(int $pid): void
    {
        $this->attributes['product_id'] = $pid;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
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

    public function setRecipeId(int $rid): void
    {
        $this->attributes['recipe_id'] = $rid;
    }

    public function setRecipe(Recipe $recipe): void
    {
        $this->Recipe = $recipe;
    }

    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function getRecipeId(): int
    {
        return $this->attributes['recipe_id'];
    }

    public function getRecipe(): Recipe
    {
        return $this->Recipe;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }
}

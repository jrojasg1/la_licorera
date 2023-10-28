<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Http\Request;

class Product extends Model
{
    /**
     * $this->atribute['id'] - int - Primary key
     * this->atribute['name'] - string - the name of this product
     * this->atribute['type'] - string - the kind of drink it is
     * this->atribute['alcohol_content'] - int - the alcohol concentration of this product
     *  this->atribute['price'] - int - how much does it cost
     * this->atribute['stock'] - int - how many of this product do we have available
     * this->atribute['image'] - string - the name of the file for the foto
     * this->atribute['created_at'] - timestamp - when was this product created
     * this->atribute['updated_at'] - timestamp - when was this products's information last updated
     * this->ingridient - Ingridient - relation between each product and however many recipes they appear in
     * this->item - Item[] - relation between a product and the orders they appear in
     */
    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|max:255',
            'type' => 'required',
            'description' => 'required',
            'alcoholContent' => 'required',
            'price' => 'required|numeric|gt:0',
            'stock' => 'required',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return strtoupper($this->attributes['name']);
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getAlcoholContent(): int
    {
        return $this->attributes['alcohol_content'];
    }

    public function setAlcoholContent(int $alcoholContent): void
    {
        $this->attributes['alcohol_content'] = $alcoholContent;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    public function getIngredients(): Collection
    {
        return $this->Ingredients;
    }

    public function setIngredients(Collection $Ingredients)
    {
        $this->Ingredients = $Ingredients;
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

    public static function sumPricesByQuantities($products, $productsInSession): int
    {
        $total = 0;
        foreach ($products as $product) {
            $total = $total + ($product->getPrice() * $productsInSession[$product->getId()]);
        }

        return $total;
    }
}

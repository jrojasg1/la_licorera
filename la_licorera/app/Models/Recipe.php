<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Http\Request;

class Recipe extends Model
{
    /**
     * $this->atribute['id'] - int - Primary key
     * $this->atribute['name'] - string - Nombre de la receta
     * this->atribute['instructions'] - string - what must the user do to make this recipe
     * this->atribute['difficulty'] - int - how hard is this recipe according to the person that made it
     * this->atribute['created_at'] - timestamp - when was this recipe created
     * this->atribute['updated_at'] - timestamp - when was this recipe's information last updated
     * this->atribute['user_id'] - int - the id of the user that made this recipe
     * this->user - User - the one that uploaded this recipe
     * this->ingridients - Ingridient[] - what products are needed for this recipe
     */
    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|max:255',
            'difficulty' => 'required|gt:0',
            'instructions' => 'required',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getInstructions(): string
    {
        return $this->attributes['instructions'];
    }

    public function setIntructions(string $Instr)
    {
        $this->attributes['instructions'] = $Instr;
    }

    public function getDifficulty(): string
    {
        return $this->attributes['difficulty'];
    }

    public function setDifficulty(string $dif): void
    {
        $this->attributes['difficulty'] = $dif;
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingridient::class);
    }

    public function getIngredients(): Collection
    {
        return $this->Ingredients;
    }

    public function setIngredients(Collection $Ingredients)
    {
        $this->Ingredients = $Ingredients;
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
}

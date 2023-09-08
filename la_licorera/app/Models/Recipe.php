<?php

namespace App\Models;

use App\Models\Ingredient;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Recipe extends Model
{
        /**
     * $this->atribute['id']-int-Primary key
     * this->atribute['instructions']-string-what must the user do to make this recipe
     * this->atribute['difficulty']-int- how hard is this recipe according to the person tha tmade it
     * this->User-User-the one that uploaded this recipe 
     * this->ingridients-Ingridient[]-what products are needed for this recipe
     */

    public function getId():int
    {
        return $this->attributes['id'];
    }

    
    public function getName():string
    {
        return $this->attributes['name'];
    }

    public function getInstructions():string
    {
        return $this->attributes['instructions'];
    }

    public function getDifficulty():string
    {
        return $this->attributes['difficulty'];
    }

    public function ingredients():HasMany
    {
        return $this->hasMany(Ingridient::class);
    }

    public function getIngredients():Collection
    {
        return $this->Ingredients;
    }

    public function setIngredients(Collection $Ingredients)
    {
        $this->Ingredients=$Ingredients;
    }

    public function setUserId(int $uid):void
    {
        $this->attributes['user_id']=$uid;
    }

    public function getUser():User
    {
        return $this->User;
    }

    public function setUser(User $user):void
    {
        $this->User=$user;
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminRecipeController extends Controller
{
    public function create()
    {
        $viewData = [];
        $viewData['title'] = __('recipeAdmin.title');
        $viewData['products'] = Product::all();

        return view('admin.recipe.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {

        Recipe::validate($request);

        $newRecipe = new Recipe();
        $newRecipe->setName($request->input('name'));
        $newRecipe->setIntructions($request->input('instructions'));
        $dif = $request->input('difficulty');
        $newRecipe->setDifficulty(($dif));
        $userId = auth()->user()->id;
        $newRecipe->setUserId($userId);
        $newRecipe->save();
        $products = $request->input('product');
        $quantities = $request->input('quantity');
        foreach ($products as $index => $product) {
            $quantity = $quantities[$index];
            $ingredient = new Ingredient();
            $ingredient->setQuantity(intval($quantity));
            $ingredient->setProductId($product);
            $ingredient->setRecipeId($newRecipe->getId());
            $ingredient->save();
        }
        return redirect()->route('admin.home.index');
    }
}

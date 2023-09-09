<?php 
    namespace App\Http\Controllers;
    use Illuminate\View\View;
    use App\Models\User;
    use App\Models\Recipe;
    class RecipeAdminController extends Controller{
        public function index():View
        {
            $viewData["title"]= "Products - Online Store";
            $viewData["subtitle"] =  "List of products";
            $viewData["recipe"] = Recipe::with('users')->get();
            return view('admin.recipe.index')->with("viewData", $viewData);
        }
        public function show(string $id):View
        {
            $viewData=[];

            $recipe = Recipe::findOrFail($id);
            $viewData["title"] = $recipe->getName();
            $viewData["subtitle"] =  $recipe->getName();
            $viewData["body"] =  $recipe->getInstructions();
            $viewData["difficulty"] =  $recipe->getDifficulty();
            $viewData["author"] =  $recipe->getUser();
            $viewData["recipe"]=$recipe; 

        }
    }
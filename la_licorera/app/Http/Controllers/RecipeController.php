<?php 
    namespace App\Http\Controllers;
    use App\Models\User;
    use App\Models\Recipe;
    use Illuminate\View\View; //que es Illuminate
    class HomeController extends Controller{
        public function show(string $id):View
        {
            $viewData=[];
            $recipe = Recipe::findOrFail($id);
            $viewData["title"] = $recipe->getName()."-see Recipe";
            $viewData["subtitle"] =  $recipe->getName()."- Recipe";
            $viewData["recipe"]=$recipe; 
            return view('recipe.show')->with("viewData",$viewData)

        }
        public function showAdmin():View
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
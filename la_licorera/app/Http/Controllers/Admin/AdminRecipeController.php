<?php 
    namespace App\Http\Controllers\Admin;

    use App\Models\Recipe;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Http\RedirectResponse;
    

    class AdminRecipeController extends Controller{
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
        public function create()
        {
        $viewData = [];
        $viewData["title"] = "Admin Page - Products - Online Store";
        
        return view('admin.recipe.create')->with("viewData", $viewData);
        }

        public function save($request):RedirectResponse
        {

            Recipe::validate($request);
        
            $newRecipe = new Recipe(); 
            $newRecipe->setName($request->input('name')); 
            $newRecipe->setIntructions($request->input('instructions'));
            $dif=$request->input('difficulty');
            $newRecipe->setAlcoholContent(intval($dif)); 
            $userId=auth()->user()->id;
            $newRecipe->setUserId($userId);
            $newRecipe->save(); 
            
            return redirect()->route('admin.home.index');
        }
    }
<?php 
    namespace App\Http\Controllers\Admin;
    use Illuminate\View\View;
    use App\Models\User;
    use App\Http\Controllers\Controller;
    use App\Models\Recipe;
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

        public function save(string $id):View
        {

            Recipe::validate($request);
        
            $newProduct = new Recipe(); 
            $newProduct->setName($request->input('name')); 
            $newProduct->setIntructions($request->input('instructions'));
            $dif=$request->input('difficulty');
            $newProduct->setAlcoholContent(intval($dif)); 
            $newProduct->save(); 
            
            return redirect()->route('admin.home.index');
        }
    }
<?php 
    namespace App\Http\Controllers\Admin;

    use App\Models\Recipe;
    use App\Models\Product;
    use App\Models\Ingredient;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Http\RedirectResponse;
    

    class AdminRecipeController extends Controller
    {

        public function index()
        {
            $viewData["title"]= "Products - Online Store";
            $viewData["subtitle"] =  "List of products";
            $viewData["recipe"] = Recipe::with('users')->get();
            return view('admin.recipe.index')->with("viewData", $viewData);
        }
        public function create()
        {
        $viewData = [];
        $viewData["title"] = __('recipeAdmin.title');
        $viewData["products"]=Product::all();
        return view('admin.recipe.create')->with("viewData", $viewData);
        }

        public function save(Request $request): RedirectResponse
        {

            Recipe::validate($request);
        
            $newRecipe = new Recipe(); 
            $newRecipe->setName($request->input('name')); 
            $newRecipe->setIntructions($request->input('instructions'));
            $dif = $request->input('difficulty');
            $newRecipe->setDifficulty(($dif));
            $userId=auth()->user()->id;
            $newRecipe->setUserId($userId);
            $newRecipe->save();
            $product1=$request->input('product1');
            $product2=$request->input('product2');
            $product3=$request->input('product3');
            $product4=$request->input('product4');
            $product5=$request->input('product5');     
            if ($product1){
                $Ingredient1=new Ingredient();
                $Ingredient1->setQuantity(intval($request->input('q1')));
                $Ingredient1->setProductId($request->input('product1'));
                $Ingredient1->setRecipeId($newRecipe->getId());
                $Ingredient1->save();
            }
            if ($product2){
                $Ingredient2=new Ingredient();
                $Ingredient2->setQuantity(intval($request->input('q2')));
                $Ingredient2->setProductId($request->input('product2'));
                $Ingredient2->setRecipeId($newRecipe->getId());
                $Ingredient2->save();
            }
            if ($product3){
                $Ingredient3=new Ingredient();
                $Ingredient3->setQuantity(intval($request->input('q3')));
                $Ingredient3->setProductId($request->input('product3'));
                $Ingredient3->setRecipeId($newRecipe->getId());
                $Ingredient3->save();
            }
            if ($product4){
                $Ingredient4=new Ingredient();
                $Ingredient4->setQuantity(intval($request->input('q4')));
                $Ingredient4->setProductId($request->input('product4'));
                $Ingredient4->setRecipeId($newRecipe->getId());
                $Ingredient4->save();
            }
            if ($product5){
                $Ingredient5=new Ingredient();
                $Ingredient5->setQuantity(intval($request->input('q5')));
                $Ingredient5->setProductId(intval($request->input('product5')));
                $Ingredient5->setRecipeId($newRecipe->getId());
                $Ingredient5->save();
            }
            
            return redirect()->route('admin.home.index');
        }
    }
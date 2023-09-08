<?php 
    namespace App\Http\Controllers;
    use Illuminate\View\View; //que es Illuminate
    class HomeController extends Controller{
        public function index(string $id):View{
            $viewData=[];
            $recipe = Recipe::findOrFail($id);
            $viewData["title"] = $product->getName()." - Online Store";
            $viewData["subtitle"] =  $product->getName()." - Product information";
        }
        public function indexAdmin():View{
            $viewData=[];
            $viewData['title']=__('homeAdmin.title');
            return view('home.indexAdmin')->with('viewData',$viewData);;
        }
    }
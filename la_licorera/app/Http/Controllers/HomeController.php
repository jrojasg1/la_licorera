<?php 
    namespace App\Http\Controllers;

    use Illuminate\View\View; //que es Illuminate
    use App\Models\Product;

    class HomeController extends Controller{
        public function index():View{
           /* $viewData=[];
            $viewData['title']=__('home.title');
            return view('home.index')->with('viewData',$viewData);*/

            $viewData = [];
            $viewData['title']=__('home.title');
            $viewData["products"] = Product::all()->take(4);
            return view('home.index')->with("viewData", $viewData);
        }

        
    }
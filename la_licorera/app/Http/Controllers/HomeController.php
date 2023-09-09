<?php 
    namespace App\Http\Controllers;
    use Illuminate\View\View; //que es Illuminate
    class HomeController extends Controller{
        public function index():View{
            $viewData=[];
            $viewData['title']=__('home.title');
            return view('home.index')->with('viewData',$viewData);
        }
    }
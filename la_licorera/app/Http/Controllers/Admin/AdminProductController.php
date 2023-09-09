<?php
namespace App\Http\Controllers\Admin;


use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class AdminProductController extends Controller
{
    public function index()
    {
    $viewData = [];
    $viewData["title"] = "Admin Page - Products - Online Store";
    $viewData["products"] = Product::all();
    return view('admin.product.index')->with("viewData", $viewData);
    }

    public function store(Request $request): RedirectResponse
    { 

        Product::validate($request);
        
        $newProduct = new Product(); 
        $newProduct->setName($request->input('name')); 
        $newProduct->setType($request->input('type'));
        $newProduct->setDescription($request->input('description')); 
        $content=$request->input('alcohol_content');
        $newProduct->setAlcoholContent(intval($content)); 
        $newProduct->setPrice($request->input('price'));
        $newProduct->setStock($request->input('stock'));  
        $newProduct->setImage(1); 
        $newProduct->save(); 
        
        return redirect()->route('admin.home.index');
 
    } 

}
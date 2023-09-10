<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Product;

class ProductController extends Controller
{
    

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - La Licorera";
        $viewData["subtitle"] =  "Lista de licores";
        $viewData["products"] = Product::all();
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName();
        $viewData["subtitle"] =  $product->getName();
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }



}

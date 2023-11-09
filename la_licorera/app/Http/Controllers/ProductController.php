<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('product.title');
        $viewData['subtitle'] = __('product.subtitle');
        $sort = $request->query('sort');
        if ($sort) {
            $viewData['products'] = Product::orderBy('price', $sort)->get();
        } else {
            $viewData['products'] = Product::all();
        }
        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $ingredients = $product->getIngredients();
        $price = $product->getPrice();

        $url = 'https://api.exchangerate-api.com/v4/latest/USD';
        $json = file_get_contents($url);
        $exp = json_decode($json);

        $convertion = $exp->rates->COP;

        $converted = $price * $convertion;

        $viewData['title'] = $product->getName();
        $viewData['subtitle'] = $product->getName();
        $viewData['product'] = $product;
        $viewData['cop'] = $converted;
        $viewData['user'] = $userId = auth()->user();

        return view('product.show')->with('viewData', $viewData);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('home.title');
        $viewData['products'] = Product::all()->take(4);

        return view('home.index')->with('viewData', $viewData);
    }
}

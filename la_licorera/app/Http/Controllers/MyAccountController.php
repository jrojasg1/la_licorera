<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class MyAccountController extends Controller
{
    public function orders(): View
    {
        $viewData = [];
        $viewData["title"] = "Mis pedidos";
        $viewData["subtitle"] = "Mis pedidos";
        $viewData["orders"] = Order::with(['items.product'])->where('user_id', Auth::user()->getId())->get();
        return view('myaccount.orders')->with("viewData", $viewData);
    }
}
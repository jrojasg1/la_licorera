<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminOrderController extends Controller
{
    public function index(): view
    {
        $viewData = [];
        $viewData['title'] = __('order.title');
        $viewData['subtitle'] = __('order.subtitle');
        $viewData['orders'] = Order::with(['items.product'])->where('user_id', Auth::user()->getId())->get();

        return view('admin.order.index')->with('viewData', $viewData);
    }
}



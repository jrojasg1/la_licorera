<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function purchase(Request $request)
    {
        $productsInSession = $request->session()->get('cart_product_data');
        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setState('');
            $order->setUserId($userId);
            $order->setTotal(0);
            $order->save();

            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $amount = $productsInSession[$product->getId()];
                $item = new Item();
                $item->setAmount($amount);
                $item->setSubtotal($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total = $total + ($product->getPrice() * $amount);
                $currentStock = $product->getStock();
                $newStock = $currentStock - $amount;
                $product->setStock($newStock);
                $product->save();
            }
            $order->setTotal($total);
            $order->setState('Pendiente');
            $order->save();
            $newBalance = Auth::user()->getWallet() - $total;
            Auth::user()->setWallet($newBalance);
            Auth::user()->save();

            $request->session()->forget('cart_product_data');

            $viewData = [];
            $viewData['title'] = __('cart.purchase');
            $viewData['subtitle'] = __('cart.purchasest');
            $viewData['order'] = $order;

            return view('cart.purchase')->with('viewData', $viewData);
        } else {
            return redirect()->route('cart.index');
        }
    }

    public function index(Request $request): View
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('cart_product_data');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }
        $viewData = [];
        $viewData['title'] = __('cart.title');
        $viewData['subtitle'] = __('cart.subtitle');
        $viewData['total'] = $total;
        $viewData['products'] = $productsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(string $id, Request $request): RedirectResponse
    {
        $cartProductData = $request->session()->get('cart_product_data');
        $amount = $request->input('amount');
        $cartProductData[$id] = intval($amount);
        $request->session()->put('cart_product_data', $cartProductData);

        return redirect()->route('cart.index');
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_product_data');

        return redirect()->route('cart.index');
    }
}

<?php

namespace App\Util;

use App\Interfaces\PaymentInterface;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentAccount implements PaymentInterface
{
    public function processPayment(Request $request):RedirectResponse
    {
        $productsInSession = $request->session()->get('cart_product_data');
        if ($productsInSession) {

            $productsInSession = $request->session()->get('cart_product_data');
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

            return back();
        } else {
            return redirect()->route('cart.index');
        }
    }
}

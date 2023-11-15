<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentInterface;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function purchaseVoucher(Request $request):RedirectResponse
    {
        $payment = $request->get('payment_type');

        $paymentInterface = app(PaymentInterface::class, ['payment_type' => $payment]);
        $paymentInterface->processPayment($request);

        return back();

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

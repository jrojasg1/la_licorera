<?php

namespace App\Util;

use App\Interfaces\PaymentInterface;
use App\Models\Product;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PaymentVoucher implements PaymentInterface
{
    public function processPayment(Request $request):RedirectResponse
    {
        $productsInSession = $request->session()->get('cart_product_data');
        $total = 0;
        $productsInCart = Product::findMany(array_keys($productsInSession));
        $items = [];
        $total = 0;
        foreach ($productsInCart as $product) {
            $amount = $productsInSession[$product->getId()];
            $subtotal = $product->getPrice() * $amount;
            $items[] = [
                'product' => $product,
                'amount' => $amount,
                'subtotal' => $subtotal,
            ];
            $total += $subtotal;
        }

        $viewData = [
            'items' => $items,
            'total' => $total,
        ];
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $pdf = new Dompdf($options);
        $html = view('cart.pdf', $viewData)->render();

        $pdf->loadHtml($html);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        $pdf->stream('invoice.pdf');

        return back();
    }
}

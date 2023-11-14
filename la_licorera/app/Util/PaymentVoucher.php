<?php

namespace App\Util;

use App\Interfaces\PaymentInterface;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Dompdf\Dompdf;
use Dompdf\Options;

class PaymentVoucher implements PaymentInterface
{
    public function processPayment(Request $request)
    {
        // Usar Dompdf para generar el PDF
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
                'subtotal' => $subtotal
            ];

            $total += $subtotal;

            // Actualizar stock y otros datos según tu lógica
            // ...
        }

        $data = [
            'items' => $items,
            'total' => $total
            // Otros datos que desees incluir en el PDF
        ];

        // Configurar Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);

        // Crear una instancia de Dompdf con las opciones
        $pdf = new Dompdf($options);

        // Renderizar la vista en HTML
        $html = view('cart.pdf', $data)->render();
        // Cargar HTML en Dompdf
        $pdf->loadHtml($html);

        // (Opcional) Configurar el tamaño y la orientación del papel
        $pdf->setPaper('A4', 'portrait');

        // Renderizar el PDF
        $pdf->render();

        // Descargar el PDF al navegador
        $pdf->stream('invoice.pdf');
    }

    /* protected function generateChequeInfo(): string
    {
        // Simulación: Generar información del cheque
        $chequeInfo = "Cantidad: 122333, Beneficiario: Nombre del beneficiario, Fecha: " . now();

        // Puedes personalizar esta lógica según tus requisitos reales

        return $chequeInfo;
    }*/

    /* protected function generateChequePDF(): void 
    {
        // Usar Dompdf para generar el PDF
        $pdf = Pdf::loadView('cart.pdf', compact('chequeInfo'));

        // Puedes personalizar la vista 'cheque.blade.php' según tus necesidades
        // Asegúrate de crear la vista en resources/views/cheque.blade.php

        return $pdf;
    }*/
}

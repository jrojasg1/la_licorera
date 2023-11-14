@extends('layouts.app')
@section('content')
<div class="row">
<link href="{{ asset('/css/pdf.css') }}" rel="stylesheet" />
<h1>Factura</h1>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item['product']->getName() }}</td>
                    <td>{{ $item['amount'] }}</td>
                    <td>{{ $item['product']->getPrice() }}</td>
                    <td>{{ $item['subtotal'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">
        Total: {{ $total }}
    </p>

    <div class="footer">
        <p>Gracias por su compra</p>
    </div>
</div>
@endsection
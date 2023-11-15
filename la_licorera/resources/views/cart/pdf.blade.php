@extends('layouts.app')
@section('content')
<div class="row">
<link href="{{ asset('/css/pdf.css') }}" rel="stylesheet" />
<h1>{{__('cart.pdfTitle')}}</h1>

    <table>
        <thead>
            <tr>
                <th> {{__('cart.pdfProduct')}}</th>
                <th> {{__('cart.pdfQuantity')}}</th>
                <th> {{__('cart.pdfPrice')}}</th>
                <th> {{__('cart.pdfSubTotal')}}</th>
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
    {{__('cart.pdfTotal')}}: {{ $total }}
    </p>

    <div class="footer">
        <p> {{__('cart.thanks')}}</p>
    </div>
</div>
@endsection
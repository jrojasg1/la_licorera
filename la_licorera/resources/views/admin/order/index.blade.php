@extends('layouts.admin')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@forelse ($viewData["orders"] as $order)
<div class="card mb-4">
    <div class="card-header">
        Order #{{ $order->getId() }}
    </div>
    <div class="card-body">
        <b>{{__('order.date')}}:</b> {{ $order->getCreatedAt() }}<br />
        <b>{{__('order.total')}}:</b> ${{ $order->getTotal() }}<br />
        <table class="table table-bordered table-striped text-center mt-3">
            <thead>
                <tr>
                    <th scope="col">{{__('order.item')}}</th>
                    <th scope="col">{{__('order.name')}}</th>
                    <th scope="col">{{__('order.price')}}</th>
                    <th scope="col">{{__('order.quantity')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->getItems() as $item)
                <tr>
                    <td>{{ $item->getId() }}</td>
                    <td>
                        <a class="link-success" href="{{ route('product.show', ['id'=> $item->getProduct()->getId()]) }}">
                            {{ $item->getProduct()->getName() }}
                        </a>
                    </td>
                    <td>${{ $item->getSubTotal() }}</td>
                    <td>{{ $item->getAmount() }}</td>
                    <td>{{ $order->getUser()->getAddresses() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@empty
<div class="alert alert-danger" role="alert">
    {{__('order.empty')}}
</div>
@endforelse
@endsection
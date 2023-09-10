@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="{{ asset('/storage/'.$viewData["product"]->getImage()) }}" class="img-fluid rounded-start">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData["product"]->getName() }}
                </h5>
                <p class="card-text">{{ $viewData["product"]->getDescription() }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Tipo: {{ $viewData["product"]->getType() }}</li>
                <li class="list-group-item">% Alcohol: {{ $viewData["product"]->getAlcoholContent() }}</li>
                <li class="list-group-item">Precio: {{ $viewData["product"]->getPrice() }}</li>
                <li class="list-group-item">Disponibles: {{ $viewData["product"]->getStock() }}</li>
            </ul>
            <p class="card-text">
            <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
                <div class="row">
                    @csrf
                    <div class="col-auto">
                        <div class="input-group col-auto">
                            <div class="input-group-text">Quantity</div>
                            <input type="number" min="1"  class="form-control quantity-input" name="amount"
                                value="1">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button class="btn bg-primary text-white" type="submit">Add to cart</button>
                    </div>
                </div>
            </form>
            </p>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
@endsection
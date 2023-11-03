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
                <li class="list-group-item">{{__('product.type')}}: {{ $viewData["product"]->getType() }}</li>
                <li class="list-group-item">{{__('product.alcoholContent')}}: {{ $viewData["product"]->getAlcoholContent() }}</li>
                <li class="list-group-item">{{__('product.price')}}: {{ $viewData["product"]->getPrice() }}</li>
                <li class="list-group-item">{{__('product.available')}}: {{ $viewData["product"]->getStock() }}</li>
            </ul>
            <p class="card-text">
            <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['product']->getId()]) }}">
                <div class="row">
                @csrf
                    @if($viewData["user"])
                        <div class="col-auto">
                            <div class="input-group col-auto">
                                <div class="input-group-text">{{__('product.quantity')}}</div>
                                <input type="number" min="1"  class="form-control quantity-input" name="amount"
                                    value="1">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn bg-primary text-white" type="submit">{{__('product.add')}}</button>
                        </div>
                    @endif
                </div>
            </form>
            </p>
            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">{{__('product.name')}}</th>
                    <th scope="col">{{__('product.difficulty')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData['product']->getIngredients() as $ingredient)
                <tr>
                    <td>{{ $ingredient->getRecipe()->getName() }}</td>
                    <td>{{ $ingredient->getRecipe()->getDifficulty() }}</td>
                </tr>
                @endforeach
        </div>
    </div>
</div>
@endsection
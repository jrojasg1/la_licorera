@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
    @foreach ($viewData["products"] as $product)
    <div class="col-md-4 col-lg-3 mb-2 " >
        <div class="card products" >
            <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top img-card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item fw-bold">{{ $product->getName() }}</li>
                <li class="list-group-item">{{ $product->getType() }}</li>
                <li class="list-group-item">{{ $product->getPrice() }}</li>
            </ul>
            <div class="card-body text-center">
                <a href="{{ route('product.show', ['id'=> $product->getId() ]) }}"
                    class="btn bg-primary text-white">Ver</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="text-center">
    <div class="row">
        <h1>{{__('home.slogan')}}</h1>
        <h5 class="mb-3" >{{__('home.subtitle')}}</h5>
        @foreach ($viewData["products"] as $product)
        <div class="col-md-4 col-lg-3 mb-2 ">
            <div class="card products">
                <img src="{{ asset('/storage/'.$product->getImage()) }}" class="card-img-top img-card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item fw-bold">{{ $product->getName() }}</li>
                    <li class="list-group-item">{{ $product->getType() }}</li>
                    <li class="list-group-item">{{ $product->getPrice() }}</li>
                </ul>
                <div class="card-body text-center">
                    <a href="{{ route('product.show', ['id'=> $product->getId() ]) }}"
                        class="btn bg-primary text-white">{{__('home.ver')}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('product.index') }}" class="mt-2 btn bg-primary text-white">{{__('home.empezar')}}</a>
</div>

@endsection
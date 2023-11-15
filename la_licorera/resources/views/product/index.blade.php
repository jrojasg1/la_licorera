@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')

<div class="col-md-12 mb-3">
    <span><b>{{__('product.sort')}}</b></span>
    <a href="{{URL::current()}}" style="color:black">{{__('product.nosort')}}</a>
    <a href="{{URL::current()."?sort=asc"}}" style="color:black">{{__('product.asc')}}</a>
    <a href="{{URL::current()."?sort=desc"}}" style="color:black">{{__('product.desc')}}</a>
</div>
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
                    class="btn bg-warning text-dark">{{__('product.see')}}</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
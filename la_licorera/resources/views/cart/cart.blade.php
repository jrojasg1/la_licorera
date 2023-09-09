@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["cartProducts"] as $product)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
      <div class="card-body text-center">
        <a class="btn bg-primary text-white">{{ $product['product']->getName() }}</a>
        <a class="btn bg-primary text-white">{{ $product['amount'] }}</a>
        <a class="btn bg-primary text-white">{{ $product['product']->getPrice() }} $</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection

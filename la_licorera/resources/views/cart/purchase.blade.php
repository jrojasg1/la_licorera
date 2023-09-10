@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card">
  <div class="card-header">
    {{__('cart.complete')}}
  </div>
  <div class="card-body">
    <div class="alert alert-success" role="alert">
        {{__('cart.thanks')}} <b>#{{ $viewData["order"]->getId() }}</b>
    </div>
  </div>
</div>
@endsection
@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
    @foreach ($viewData["recipe"] as $recipe)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card-body text-center">
                <a class="btn bg-primary text-white">{{ $recipe->getName() }} </a>
                <a class="btn bg-primary text-white"> {{ $recipe->getDifficuulty() }} /10</a>
            </div>
        </div>
    @endforeach
</div>
@endsection

@extends('layouts.admin')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ $viewData["recipe"]->getName() }}
                </h5>
         @foreach($viewData["recipe"]->ingridients as $ingridients)
          - {{ $ingridients->getProduct()->getName() }}<br />
        @endforeach

        <p class="card-text">
          {{ $viewData["recipe"]->getDifficulty() }} / 10
        </p>
        <p class="card-text">
          {{ $viewData["recipe"]->getInstruction() }}
        </p>

        <!--<p class="card-text">{{ $viewData["product"]["description"] }}</p>-->
      </div>
    </div>
  </div>
</div>
@endsection

<!--"{{ route('admin.recipe.show', ['id'=> $recipe["id"]])}}"-->
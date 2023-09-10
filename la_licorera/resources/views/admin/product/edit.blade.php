@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Edit Product
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" class="form-control mb-3" placeholder="Enter name" name="name"
                value="{{ $viewData['product']->getName() }}" />
            <select class="form-select mb-3" name="type" aria-label="Default select example">
                <option selected>{{ $viewData['product']->getType() }}</option>
                <option value="whisky">{{__('productAdmin.whisky')}}</option>
                <option value="vodka">{{__('productAdmin.vodka')}}</option>
                <option value="tequila">{{__('productAdmin.tequila')}}</option>
                <option value="ron">{{__('productAdmin.ron')}}</option>
            </select>
            <input type="text" class="form-control mb-3" placeholder="Enter description" name="description"
                value="{{ $viewData['product']->getDescription() }}" />
            <input type="number" class="form-control mb-3" placeholder="Enter alcoholContent" name="alcoholContent"
                value="{{ $viewData['product']->getAlcoholContent() }}" />
            <input type="number" class="form-control mb-3" placeholder="Enter price" name="price"
                value="{{ $viewData['product']->getPrice() }}" />
            <input type="number" class="form-control mb-3" placeholder="Enter stock" name="stock"
                value="{{ $viewData['product']->getStock() }}" />
            <div class="row">
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input class="form-control" type="file" name="image">
                        </div>
                    </div>
                </div>
                <div class="col">
                    &nbsp;
                </div>
            </div>
            <button type="submit" class="btn btn-success">Editar</button>
        </form>
    </div>
</div>
@endsection
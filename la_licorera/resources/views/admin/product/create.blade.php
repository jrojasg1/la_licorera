@extends('layouts.admin')
@section("title", $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        {{__('productAdmin.create')}}
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control mb-3" placeholder="{{__('productAdmin.name')}}" name="name"
                value="{{ old('name') }}" />
            <select class="form-select mb-3" name="type" aria-label="Default select example">
                <option selected>-{{__('productAdmin.type')}}</option>
                <option value="whisky">{{__('productAdmin.whisky')}}</option>
                <option value="vodka">{{__('productAdmin.vodka')}}</option>
                <option value="tequila">{{__('productAdmin.tequila')}}</option>
                <option value="ron">{{__('productAdmin.ron')}}</option>
            </select>
            <input type="text" class="form-control mb-3" placeholder="{{__('productAdmin.description')}}" name="description"
                value="{{ old('description') }}" />
            <input type="number" class="form-control mb-3" placeholder="{{__('productAdmin.alcoholContent')}}" name="alcoholContent"
                value="{{ old('alcohol_content') }}" />
            <input type="number" class="form-control mb-3" placeholder="{{__('productAdmin.price')}}" name="price"
                value="{{ old('price') }}" />
            <input type="number" class="form-control mb-3" placeholder="{{__('productAdmin.stock')}}" name="stock"
                value="{{ old('stock') }}" />
            <div class="row">
                <div class="col">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('productAdmin.image')}}:</label>
                    <div class="mb-3 row">
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input class="form-control" type="file" name="image">
                        </div>
                    </div>
                </div>
                <div class="col">
                    &nbsp;
                </div>
            </div>
            <input type="submit" class="btn btn-outline-primary mx-auto d-grid gap-2 col-6" value="{{__('productAdmin.submit')}}" />
        </form>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('title', $viewData["title"])
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

        <form method="POST" action="{{ route('admin.product.store') }}">
            @csrf
            <input type="text" class="form-control mb-2" placeholder="{{__('productAdmin.name')}}" name="name"
                value="{{ old('name') }}" />
            <select class="form-select" name="type" aria-label="Default select example">
                <option selected>-{{__('productAdmin.type')}}</option>
                <option value="whisky">{{__('productAdmin.whisky')}}</option>
                <option value="vodka">{{__('productAdmin.vodka')}}</option>
                <option value="tequila">{{__('productAdmin.tequila')}}</option>
                <option value="ron">{{__('productAdmin.ron')}}</option>
            </select>
            <input type="text" class="form-control mb-2" placeholder={{__('productAdmin.description')}} name="description"
                value="{{ old('description') }}" />
            <input type="number" class="form-control mb-2" placeholder={{__('productAdmin.alcoholContent')}} name="alcoholContent"
                value="{{ old('alcohol_content') }}" />
            <input type="number" class="form-control mb-2" placeholder="{{__('productAdmin.price')}}" name="price"
                value="{{ old('price') }}" />
            <input type="number" class="form-control mb-2" placeholder="{{__('productAdmin.stock')}}" name="stock"
                value="{{ old('stock') }}" />
            <input type="submit" class="btn btn-success" value="{{__('productAdmin.submit')}}" />
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{__('productAdmin.manage')}}
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">{{__('productAdmin.id')}}</th>
                    <th scope="col">{{__('productAdmin.name')}}</th>
                    <th scope="col">{{__('productAdmin.edit')}}</th>
                    <th scope="col">{{__('productAdmin.delete')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["products"] as $product)
                <tr>
                    <td>{{ $product->getId() }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>{{__('productAdmin.edit')}}</td>
                    <td>{{__('productAdmin.delete')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
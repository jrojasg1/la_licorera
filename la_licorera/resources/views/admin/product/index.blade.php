@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-4">
    <div class="card-header">
        Create Products
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
            <input type="text" class="form-control mb-2" placeholder="Enter name" name="name"
                value="{{ old('name') }}" />
            <select class="form-select" name="type" aria-label="Default select example">
                <option selected>-Enter type</option>
                <option value="whisky">whisky</option>
                <option value="vodka">vodka</option>
                <option value="tequila">tequila</option>
                <option value="ron">ron</option>
            </select>
            <input type="text" class="form-control mb-2" placeholder="Enter description" name="description"
                value="{{ old('description') }}" />
            <input type="number" class="form-control mb-2" placeholder="Enter alcoholContent" name="alcoholContent"
                value="{{ old('alcoholContent') }}" />
            <input type="number" class="form-control mb-2" placeholder="Enter price" name="price"
                value="{{ old('price') }}" />
            <input type="number" class="form-control mb-2" placeholder="Enter stock" name="stock"
                value="{{ old('stock') }}" />
            <input type="submit" class="btn btn-success" value="Enviar" />
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header">
        Manage Products
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewData["products"] as $product)
                <tr>
                    <td>{{ $product->getId() }}</td>
                    <td>{{ $product->getName() }}</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
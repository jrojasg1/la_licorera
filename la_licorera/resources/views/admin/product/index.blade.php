@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
    <div class="card-header">
        {{__('productAdmin.manage')}}
    </div>

    <div class="card-body">
        <a class="btn btn-success mb-3 shadow" href="{{ route('admin.product.create') }}">
            <i class="bi bi-plus-lg"></i>
        </a>
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
                    <td>
                        <a class="btn btn-primary shadow" href="{{route('admin.product.edit', ['id'=> $product->getId()])}}">

                            <i class="bi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('admin.product.delete', $product->getId())}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger shadow">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
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
                    <td>
                        {{__('productAdmin.edit')}}
                        <a class="btn btn-primary" href="{{route('admin.product.edit', ['id'=> $product->getId()])}}">

                            <i class="bi-pencil"></i>
                        </a>
                    </td>
                    <td>
                        {{__('productAdmin.delete')}}
                        <form action="{{ route('admin.product.delete', $product->getId())}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
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
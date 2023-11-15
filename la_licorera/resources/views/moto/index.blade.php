@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <h1><b>{{__('moto.motorhub')}}</b></h1>
        </div>
        <div class="card-body">
    @foreach ($viewData['json'] as $moto)
        <table class="table table-bordered table-striped text-center mt-3">
            <thead>
                <tr>
                    <th scope="col">{{__('moto.name')}}</th>
                    <th scope="col">{{__('moto.model')}}</th>
                    <th scope="col">{{__('moto.category')}}</th>
                    <th scope="col">{{__('moto.price')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $moto["name"] }}</td>
                    <td>{{ $moto["model"] }}</td>
                    <td>{{ $moto["category"] }}</td>
                    <td>{{ $moto["price"] }}</td>
                </tr>

            </tbody>
        </table>
    </div>
    </div>
    @endforeach
@endsection
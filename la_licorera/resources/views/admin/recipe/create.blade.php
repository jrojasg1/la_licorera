@extends('layouts.admin')
@section("title", $viewData["title"])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('recipeAdmin.create')}}</div>
                        <div class="card-body">
                            @if($errors->any())
                                <ul id="errors" class="alert alert-danger list-unstyled">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form method="POST" action="{{ route('admin.recipe.save') }}">
                                @csrf
                                <input type="text" class="form-control mb-2" placeholder="{{__('recipeAdmin.name')}}" name="name" value="{{ old('name') }}" />
                                <input type="text" class="form-control mb-2" placeholder="{{__('recipeAdmin.difficulty')}}" name="difficulty" value="{{ old('difficulty') }}" />
                                <p>{{__('recipeAdmin.recipe')}}</p>
                                <textarea row="8" cols="33" type="text" class="form-control mb-2" placeholder="" name="instructions" value="{{ old('instructions') }}" ></textarea>
                                <select name="product1" id="product1">
                                    <option value=""> {{__('recipeAdmin.product1')}} </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="{{__('recipeAdmin.quantity')}}" name="q1"
                                value="{{ old('quantity') }}" />
                                </br>
                                <select name="product2" id="product2">
                                    <option value="">{{__('recipeAdmin.product2')}}   </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="{{__('recipeAdmin.quantity')}}" name="q2"
                                    value="{{ old('quantity') }}" />
                                </br>
                                <select name="product3" id="product3">
                                    <option value=""> {{__('recipeAdmin.product3')}}  </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="{{__('recipeAdmin.quantity')}}" name="q3"
                                    value="{{ old('quantity') }}" />
                                </br>
                                <select name="product4" id="product4">
                                    <option value=""> {{__('recipeAdmin.product4')}}  </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="{{__('recipeAdmin.quantity')}}" name="q4"
                                    value="{{ old('quantity') }}" />
                                </br>
                                <select name="product5" id="product5">
                                    <option value=""> {{__('recipeAdmin.product5')}}  </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="{{__('recipeAdmin.quantity')}}" name="q5"
                                    value="{{ old('quantity') }}" />
                                </br>
                                <input type="submit" class="btn btn-primary" value="{{__('recipeAdmin.submit')}}" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@extends('layouts.admin')
@section("title", $viewData["title"])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create product</div>
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
                                <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ old('name') }}" />
                                <input type="text" class="form-control mb-2" placeholder="Enter Difficulty" name="difficulty" value="{{ old('difficulty') }}" />
                                <textarea row="8" cols="33" type="text" class="form-control mb-2" placeholder="" name="instructions" value="{{ old('difficulty') }}" ></textarea>
                                <select name="product1" id="product1">
                                    <option value="">  </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="quantity" name="q1"
                                value="{{ old('quantity') }}" />
                                </br>
                                <select name="product2" id="product2">
                                    <option value="">  </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="quantity" name="q2"
                                    value="{{ old('quantity') }}" />
                                </br>
                                <select name="product3" id="product3">
                                    <option value="">  </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="quantity" name="q3"
                                    value="{{ old('quantity') }}" />
                                </br>
                                <select name="product4" id="product4">
                                    <option value="">  </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="quantity" name="q4"
                                    value="{{ old('quantity') }}" />
                                </br>
                                <select name="product5" id="product5">
                                    <option value="">  </option>
                                    @foreach($viewData["products"] as  $prod)
                                        <option value={{ $prod->getId()}}> {{$prod->getName()}}  </option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control mb-2" placeholder="quantity" name="q5"
                                    value="{{ old('quantity') }}" />
                                </br>
                                <input type="submit" class="btn btn-primary" value="Send" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



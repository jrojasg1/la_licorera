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
                        <textarea row="8" cols="33" type="text" class="form-control mb-2" name="instructions" value="{{ old('instructions') }}"></textarea>
                        <div id="dynamic-fields">
                            <div class="dynamic-field input-group mb-3 mp-1">
                                <select name="product[]"  class="form-select ">
                                    @foreach($viewData["products"] as $prod)
                                    <option value="{{ $prod->getId() }}">{{ $prod->getName() }}</option>
                                    @endforeach
                                </select>
                                <input type="number" class="form-control " placeholder="{{__('recipeAdmin.quantity')}}" name="quantity[]" value="{{ old('quantity') }}" />
                                <button type="button" class="btn btn-danger remove-field" disabled> <i class="bi-trash"></i></button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success shadow" id="add-field"><i class="bi bi-plus-lg"></i></button>
                        </br>
                        <input type="submit" class="btn btn-primary mt-2 shadow" value="{{__('recipeAdmin.submit')}}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        // Agregar campo
        $("#add-field").click(function() {
            var clone = $(".dynamic-field:first").clone();
            clone.find("input, select").val('');
            clone.find(".remove-field").prop('disabled', false).show();
            $("#dynamic-fields").append(clone);
        });

        // Eliminar campo
        $("#dynamic-fields").on("click", ".remove-field", function() {
            $(this).closest(".dynamic-field").remove();
            // Deshabilitar el botón de eliminar si solo queda un campo
            if ($(".dynamic-field").length === 1) {
                $(".remove-field").prop('disabled', true);
            }
        });
    });
    
</script>


@endsection
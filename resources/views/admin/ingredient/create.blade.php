@extends('admin.layouts.app')

@section('page-heading')
<h2>Ingredients</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Ingredients</a>
    </li>
    <li>
        <a href="{{ route('admin.ingredient.index') }}">Listes</a>
    </li>
    <li class="active">
        <strong>Ajout</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ajouter un nouveau Ingredient</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.ingredient.store') }}" method="post">

                    {{ csrf_field() }}

                    {!! \Nvd\Crud\Form::input('libelle','text')->show() !!}

                    <div class="form-group">
                        <label for="ingredient_type_id">Type</label>
                        <select class="form-control{{ $errors->has('ingredient_type_id') ? ' is-invalid' : '' }} chosen-select" id="ingredient_type_id" name="ingredient_type_id" required>
                            @foreach(\App\IngredientType::all() as $item)
                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('ingredient_type_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ingredient_type_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="prix">Prix en Ar (/kg)</label>
                        <input class="form-control{{ $errors->has('prix') ? ' is-invalid' : '' }}" id="prix" name="prix" required>

                        @if ($errors->has('prix'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('prix') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Photo de l'ingrédient</label>
                        <div class="row">
                            <div class="col-lg-8">
                                <input type="file" name="image"  id="image" class="file-upload-default">
                            </div>
                            <div class="col-lg-4">
                                <img id="apercu" src="#" alt="aperçu de l'ingrédient"  width="100" height="100"/>
                            </div>
                        </div>

                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                                                                                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#apercu').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endsection

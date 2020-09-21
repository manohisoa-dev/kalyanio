@extends('admin.layouts.app')

@section('page-heading')
<h2>Nourriture Ingredients</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Nourriture Ingredients</a>
    </li>
    <li>
        <a href="{{ route('admin.nourriture-ingredient.index') }}">Listes</a>
    </li>
    <li class="active">
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Nourriture Ingredient : {{$nourritureIngredient->nourriture_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.nourriture-ingredient.index')}}/{{$nourritureIngredient->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                    <div class="form-group">
                        <label for="nourriture_id">Nourriture</label>
                        <select class="form-control{{ $errors->has('nourriture_id') ? ' is-invalid' : '' }} chosen-select" id="nourriture_id" name="nourriture_id" required>
                            @foreach(\App\Nourriture::orderBy('libelle')->get() as $item)
                                <option value="{{$item->id}}" {{$nourritureIngredient->nourriture_id == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('nourriture_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nourriture_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="ingredient_id">Ingredient</label>
                        <select class="form-control{{ $errors->has('ingredient_id') ? ' is-invalid' : '' }} chosen-select" id="ingredient_id" name="ingredient_id" required>
                            @foreach(\App\Ingredient::orderBy('libelle')->get() as $item)
                                <option value="{{$item->id}}" {{$nourritureIngredient->ingredient_id == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('ingredient_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ingredient_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    {!! \Nvd\Crud\Form::input('poids','text')->model($nourritureIngredient)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

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
        <strong>Ajout</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ajouter un nouveau Nourriture Ingredient</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.nourriture-ingredient.store') }}" method="post">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="nourriture_id">Nourriture</label>
                        <select class="form-control{{ $errors->has('nourriture_id') ? ' is-invalid' : '' }} chosen-select" id="nourriture_id" name="nourriture_id" required>
                            @foreach(\App\Nourriture::orderBy('libelle')->get() as $item)
                                <option value="{{$item->id}}" {{ Request::input("nourriture_id") != '' && Request::input("nourriture_id") == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
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
                                <option value="{{$item->id}}">{{$item->libelle}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('ingredient_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ingredient_id') }}</strong>
                            </span>
                        @endif
                    </div>
                                            
                    <div class="form-group">
                        <label for="poids">Poids (grammes)</label>
                        <input class="form-control{{ $errors->has('poids') ? ' is-invalid' : '' }}" id="poids" name="poids" required>

                        @if ($errors->has('poids'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('poids') }}</strong>
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

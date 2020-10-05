@extends('admin.layouts.app')

@section('page-heading')
<h2>Ingredient Fournisseurs</h2>
<ol class="breadcrumb">
    <li>
        <a href="{{route('admin.planning.index')}}">Tableau de bord</a>
    </li>
    <li>
        <a href="{{route('admin.ingredient.show' , ['ingredient_id' => app('request')->input('ingredient_id')])}}">Ingredients</a>
    </li>
    <li>
        <a href="{{route('admin.fournisseur.index')}}">Fournisseurs</a>
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
                <h5>Ajouter un nouveau Ingredient Fournisseur</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.ingredient-fournisseur.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    <div class="form-group">
                        <label for="ingredient_id">Ingredient</label>
                        <select class="form-control{{ $errors->has('ingredient_id') ? ' is-invalid' : '' }} chosen-select" id="ingredient_id" name="ingredient_id" required>
                            @foreach(\App\Ingredient::all() as $item)
                                <option value="{{$item->id}}" {{$item->id == app('request')->input('ingredient_id')  ? 'selected' : ''}}>{{$item->libelle}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('ingredient_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ingredient_id') }}</strong>
                            </span>
                        @endif
                    </div>
                                            
                    <div class="form-group">
                        <label for="fournisseur_id">Fournisseur</label>
                        <select class="form-control{{ $errors->has('fournisseur_id') ? ' is-invalid' : '' }} chosen-select" id="fournisseur_id" name="fournisseur_id" required>
                            @foreach(\App\Fournisseur::all() as $item)
                                <option value="{{$item->id}}">{{$item->nom}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('fournisseur_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('fournisseur_id') }}</strong>
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

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
        <strong>Détail</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Détail Nourriture Ingredient : {{$nourritureIngredient->nourriture_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$nourritureIngredient->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Nourriture</h4>
                        <h5>{{$nourritureIngredient->nourriture_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Ingredient</h4>
                        <h5>{{$nourritureIngredient->ingredient_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Poids</h4>
                        <h5>{{$nourritureIngredient->poids}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$nourritureIngredient->created_at->diffForHumans()}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mise à jour le</h4>
                        <h5>{{$nourritureIngredient->updated_at->diffForHumans()}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection

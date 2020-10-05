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
        <strong>Détail</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Détail Ingredient Fournisseur : {{$ingredientFournisseur->ingredient_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$ingredientFournisseur->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Ingredient Id</h4>
                        <h5>{{$ingredientFournisseur->ingredient_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Fournisseur Id</h4>
                        <h5>{{$ingredientFournisseur->fournisseur_id}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection

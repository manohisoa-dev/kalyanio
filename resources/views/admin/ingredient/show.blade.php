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
        <strong>Détail</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Détail Ingredient : {{$ingredient->libelle}}</h5>  &nbsp;
                <a href="{{route('admin.ingredient-fournisseur.create')}}?ingredient_id={{$ingredient->id}}" title="Mentionner le founisseur de cet ingrédient" class="pull-right">
                    <i class="fa fa-industry" alt="Mentionner le founisseur de cet ingrédient"></i> Mentionner le founisseur de cet ingrédient
                </a>&nbsp;
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$ingredient->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Libelle</h4>
                        <h5>{{$ingredient->libelle}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Prix</h4>
                        <h5>{{$ingredient->prix}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$ingredient->created_at->diffForHumans()}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mise à jour le</h4>
                        <h5>{{$ingredient->updated_at->diffForHumans()}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection

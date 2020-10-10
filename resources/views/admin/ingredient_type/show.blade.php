@extends('admin.layouts.app')

@section('page-heading')
<h2>Ingredient Types</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Ingredient Types</a>
    </li>
    <li>
        <a href="{{ route('admin.ingredient-type.index') }}">Listes</a>
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
                <h5>Détail Ingredient Type : {{$ingredientType->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$ingredientType->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Libelle</h4>
                        <h5>{{$ingredientType->libelle}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Unite Mesure</h4>
                        <h5>{{$ingredientType->unite_mesure}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Created At</h4>
                        <h5>{{$ingredientType->created_at->diffForHumans()}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Updated At</h4>
                        <h5>{{$ingredientType->updated_at->diffForHumans()}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection

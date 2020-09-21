@extends('admin.layouts.app')

@section('page-heading')
<h2>Nourritures</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Nourritures</a>
    </li>
    <li>
        <a href="{{ route('admin.nourriture.index') }}">Listes</a>
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
                <h5>
                    Détail Nourriture : {{$nourriture->libelle}}
                    <a href="{{route('admin.nourriture.index')}}/{{$nourriture->id}}/edit">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                </h5>
                <span class="pull-right">
                    <strong>Préparation : {{$nourriture->preparation_duree}}</strong>
                    | <strong>Cuisson : {{$nourriture->cuisson}}</strong>
                </span>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h5>
                            {{$nourriture->libelle}}
                        </h5>
                        {{ $nourriture->category ? $nourriture->category->libelle : '' }}
                        - <small><i>{{ $nourriture->sousCategory ? $nourriture->sousCategory->libelle : '' }}</i></small>
                    </li>
                    <li class="list-group-item">
                        <h4>Description</h4>
                        <h5>{!! $nourriture->description !!}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Ingredients</h4>
                        <p>
                            @foreach($nourriture->ingredients()->get() as $ingredient)
                                {{$ingredient->ingredient->libelle}} &nbsp;&nbsp;&nbsp;
                                <i>
                                    {{number_format($ingredient->poids, 0, '.', ' ')}}
                                    {{$ingredient->ingredient->ingredientType()->unite_mesure}}
                                    @if($ingredient->ingredient->ingredientType()->libelle != "Liquide")
                                        @if($ingredient->poids > 1)
                                            (s)
                                        @endif
                                    @endif
                                </i> <br>
                            @endforeach
                        </p>
                    </li>
                    <li class="list-group-item">
                        <h4>Préparation</h4>
                        <p>{!! $nourriture->preparation !!}</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

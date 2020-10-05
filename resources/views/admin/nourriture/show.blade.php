@extends('admin.layouts.app')

@section('css')
    <link href="{{ asset('admin/css/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/slick/slick-theme.css') }}" rel="stylesheet">
@endsection

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
        <div class="ibox product-detail">
            <div class="ibox-content">

                <div class="row">
                    <div class="col-md-5">


                        <div class="product-images">

                            @if($nourriture->media->count() > 0)
                                <div>
                                    {{--<div class="image-imitation">--}}
                                    <div class="">
                                        <img class="img-fluid" src="{{$nourriture->getImageUrl('large')}}" alt="{{$nourriture->libelle}}">
                                    </div>
                                </div>
                                {{--/** @todo for each pour les nourritures associés à plusieurs images **/--}}
                            @else
                                <div>
                                    {{--<div class="image-imitation">--}}
                                    <div class="">
                                        <img class="img-fluid" src="http://placehold.it/598x418" alt="{{$nourriture->libelle}}">
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="col-md-7">

                        <h2 class="font-bold m-b-xs">
                            {{$nourriture->libelle}}
                        </h2>
                        <small>
                            {{ $nourriture->category ? $nourriture->category->libelle : '' }}
                            - <small><i>{{ $nourriture->sousCategory ? $nourriture->sousCategory->libelle : '' }}</i></small>
                        </small>
                        <div class="m-t-md">
                            <h2 class="product-main-price">{{ $nourriture->cout() }} <small class="text-muted">{{$nourriture->coutFmg()}}</small> </h2>
                        </div>
                        <hr>

                        <h4>Description du recette</h4>

                        <div class="small text-muted">
                            {!! $nourriture->description !!}
                        </div>
                        <hr>

                        <h4>Ingredients</h4>
                        <div class="small text-muted">
                            @foreach($nourriture->ingredients()->get() as $ingredient)
                                <strong>{{$ingredient->ingredient->libelle}}</strong> &nbsp;&nbsp; :
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
                        </div>

                        <hr>

                        <h4>Préparation</h4>

                        <div class="small text-muted">
                            {!! $nourriture->preparation !!}
                        </div>
                        <hr>

                        <div>
                            <div class="btn-group">
                                <a href="{{route('admin.nourriture-ingredient.index')}}?nourriture_id={{$nourriture->id}}" title="Ajouter des ingrédients" class="pull-left">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-plus"></i> Ajouter des ingrédients
                                    </button>
                                </a>
                                <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Ajouter dans mon favoris </button>
                                <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contacter l'administrateur </button>
                            </div>
                        </div>



                    </div>
                </div>

            </div>
            <div class="ibox-footer">
                <span class="pull-right">
                    <i class="fa fa-clock-o"></i>  Préparation : {{$nourriture->preparation_duree}} | <i class="fa fa-clock-o"></i> Cuisson : {{$nourriture->cuisson}}
                </span>
                <a href="{{route('admin.nourriture.index')}}/{{$nourriture->id}}/edit" title="Modifier la nourriture">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier la nourriture
                </a> |
                <a href="{{route('admin.nourriture-ingredient.index')}}?nourriture_id={{$nourriture->id}}" title="Ajouter des ingrédients">
                    <i class="fa fa-gears" alt="Ajouter des ingrédients"></i> Ajouter des ingrédients
                </a>&nbsp;&nbsp;
                @if($nourriture->ingredients()->count() > 0)
                    |
                    <a href="{{route('admin.ingredient-fournisseur.create')}}?ingredient_id={{$nourriture->ingredients()->first()->id}}" title="Mentionner le founisseur de ses ingrédients">
                        <i class="fa fa-industry" alt="Mentionner le founisseur de cet ingrédient"></i> Mentionner le founisseur de ses ingrédients
                    </a>&nbsp;
                @endif
            </div>
        </div>
    </div>
</div>

{{--<div class="row">--}}
    {{--<div class="col-lg-12">--}}
        {{--<div class="ibox float-e-margins">--}}
            {{--<div class="ibox-title">--}}
                {{--<h5>--}}
                    {{--Détail Nourriture : {{$nourriture->libelle}}--}}
                    {{--<a href="{{route('admin.nourriture.index')}}/{{$nourriture->id}}/edit" title="Modifier la nourriture">--}}
                        {{--<i class="fa fa-pencil-square-o" aria-hidden="true"></i>--}}
                    {{--</a>--}}
                    {{--<a href="{{route('admin.nourriture-ingredient.index')}}?nourriture_id={{$nourriture->id}}" title="Ajouter des ingrédients">--}}
                        {{--<i class="fa fa-gears" alt="Ajouter des ingrédients"></i>--}}
                    {{--</a>&nbsp;&nbsp;--}}
                    {{--<a href="#" title="Mentionner le founisseur de cet ingrédient">--}}
                        {{--<i class="fa fa-industry" alt="Mentionner le founisseur de cet ingrédient"></i>--}}
                    {{--</a>&nbsp;--}}
                {{--</h5>--}}
                {{--<span class="pull-right">--}}
                    {{--<strong>Préparation : {{$nourriture->preparation_duree}}</strong>--}}
                    {{--| <strong>Cuisson : {{$nourriture->cuisson}}</strong>--}}
                {{--</span>--}}
            {{--</div>--}}
            {{--<div class="ibox-content">--}}
                {{--<ul class="list-group">--}}
                    {{--<li class="list-group-item">--}}
                        {{--<h5>--}}
                            {{--{{$nourriture->libelle}}--}}
                        {{--</h5>--}}
                        {{--{{ $nourriture->category ? $nourriture->category->libelle : '' }}--}}
                        {{--- <small><i>{{ $nourriture->sousCategory ? $nourriture->sousCategory->libelle : '' }}</i></small>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                        {{--<h4>Description</h4>--}}
                        {{--<h5>{!! $nourriture->description !!}</h5>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                        {{--<h4>Ingredients</h4>--}}
                        {{--<p>--}}
                            {{--@foreach($nourriture->ingredients()->get() as $ingredient)--}}
                                {{--{{$ingredient->ingredient->libelle}} &nbsp;&nbsp;&nbsp;--}}
                                {{--<i>--}}
                                    {{--{{number_format($ingredient->poids, 0, '.', ' ')}}--}}
                                    {{--{{$ingredient->ingredient->ingredientType()->unite_mesure}}--}}
                                    {{--@if($ingredient->ingredient->ingredientType()->libelle != "Liquide")--}}
                                        {{--@if($ingredient->poids > 1)--}}
                                            {{--(s)--}}
                                        {{--@endif--}}
                                    {{--@endif--}}
                                {{--</i> <br>--}}
                            {{--@endforeach--}}
                        {{--</p>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                        {{--<h4>Préparation</h4>--}}
                        {{--<p>{!! $nourriture->preparation !!}</p>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item">--}}
                        {{--<h4>Photos</h4>--}}
                        {{--<p>--}}
                            {{--@if(!isset($nourriture->media))--}}
                                {{--<img class="img-fluid" src="http://placehold.it/100x100" alt="{{$nourriture->libelle}}">--}}
                            {{--@else--}}
                                {{--<img class="img-fluid" src="{{$nourriture->getImageUrl('medium')}}" alt="{{$nourriture->libelle}}">--}}
                            {{--@endif--}}
                        {{--</p>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

@endsection

@section('scripts')
    <!-- slick carousel-->
    <script src="{{ asset('admin/js/plugins/slick/slick.min.js') }}"></script>

    <script>
        $(document).ready(function(){


            $('.product-images').slick({
                dots: true
            });

        });

    </script>
@endsection

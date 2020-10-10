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
        <strong>Modification</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Ingredient Fournisseur : {{$ingredientFournisseur->ingredient_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.ingredient-fournisseur.index')}}/{{$ingredientFournisseur->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('ingredient_id','text')->model($ingredientFournisseur)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('fournisseur_id','text')->model($ingredientFournisseur)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

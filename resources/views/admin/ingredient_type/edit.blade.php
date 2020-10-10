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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Ingredient Type : {{$ingredientType->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.ingredient-type.index')}}/{{$ingredientType->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('libelle','text')->model($ingredientType)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::select( 'unite_mesure', [ 'gramme', 'litre', 'piece' ] )->model($ingredientType)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

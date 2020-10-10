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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Ingredient : {{$ingredient->libelle}}</h5> &nbsp;
                <a href="{{route('admin.ingredient-fournisseur.create')}}?ingredient_id={{$ingredient->id}}" title="Mentionner le founisseur de cet ingrédient" class="pull-right">
                    <i class="fa fa-industry" alt="Mentionner le founisseur de cet ingrédient"></i> Mentionner le founisseur de cet ingrédient
                </a>&nbsp;
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.ingredient.index')}}/{{$ingredient->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                    {!! \Nvd\Crud\Form::input('libelle','text')->model($ingredient)->show() !!}

                    <div class="form-group">
                        <label for="ingredient_type_id">Type</label>
                        <select class="form-control{{ $errors->has('ingredient_type_id') ? ' is-invalid' : '' }} chosen-select" id="ingredient_type_id" name="ingredient_type_id" required>
                            @foreach(\App\IngredientType::all() as $item)
                                <option value="{{$item->id}}" {{$ingredient->ingredient_type_id == $item->id ? 'selected' : ''}}>{{$item->libelle}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('ingredient_type_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('ingredient_type_id') }}</strong>
                            </span>
                        @endif
                    </div>

                    {!! \Nvd\Crud\Form::input('prix','text')->model($ingredient)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

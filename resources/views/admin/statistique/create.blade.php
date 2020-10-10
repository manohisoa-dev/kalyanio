@extends('admin.layouts.app')

@section('page-heading')
<h2>Statistiques</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Statistiques</a>
    </li>
    <li>
        <a href="{{ route('admin.statistique.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Statistique</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.statistique.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    {!! \Nvd\Crud\Form::input('user_id','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('nourriture_id','text')->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

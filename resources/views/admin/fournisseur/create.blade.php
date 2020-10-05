@extends('admin.layouts.app')

@section('page-heading')
<h2>Fournisseurs</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Fournisseurs</a>
    </li>
    <li>
        <a href="{{ route('admin.fournisseur.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Fournisseur</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.fournisseur.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    {!! \Nvd\Crud\Form::input('nom','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::textarea( 'apropos' )->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('tel','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('mail','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('adresse','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('ville','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('siteweb','text')->show() !!}
                                            
                    {!! \Nvd\Crud\Form::input('facebook','text')->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

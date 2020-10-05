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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Fournisseur : {{$fournisseur->nom}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.fournisseur.index')}}/{{$fournisseur->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('nom','text')->model($fournisseur)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::textarea( 'apropos' )->model($fournisseur)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('tel','text')->model($fournisseur)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('mail','text')->model($fournisseur)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('adresse','text')->model($fournisseur)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('ville','text')->model($fournisseur)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('siteweb','text')->model($fournisseur)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('facebook','text')->model($fournisseur)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

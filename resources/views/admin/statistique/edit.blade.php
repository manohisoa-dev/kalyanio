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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Statistique : {{$statistique->user_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.statistique.index')}}/{{$statistique->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}
                                                                                                
                            {!! \Nvd\Crud\Form::input('user_id','text')->model($statistique)->show() !!}
                                                                        
                            {!! \Nvd\Crud\Form::input('nourriture_id','text')->model($statistique)->show() !!}
                                                                                                                                                
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

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
        <strong>Détail</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Détail Statistique : {{$statistique->user_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$statistique->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>User Id</h4>
                        <h5>{{$statistique->user_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Nourriture</h4>
                        <h5>{{$statistique->nourriture_id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$statistique->created_at->diffForHumans()}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mise à jour le</h4>
                        <h5>{{$statistique->updated_at->diffForHumans()}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection

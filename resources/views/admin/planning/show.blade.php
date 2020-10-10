@extends('admin.layouts.app')

@section('page-heading')
<h2>Plannings</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Plannings</a>
    </li>
    <li>
        <a href="{{ route('admin.planning.index') }}">Listes</a>
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
                <h5>Détail Planning : {{$planning->nourriture_id}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$planning->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Nourriture</h4>
                        <h5>{{ $planning->nourriture ? $record->nourriture->libelle : '' }}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Date</h4>
                        <h5>{{$planning->date}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Plannifier Pour</h4>
                        <h5>{{$planning->plannifier_pour}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$planning->created_at->diffForHumans()}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mise à jour le</h4>
                        <h5>{{$planning->updated_at->diffForHumans()}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection

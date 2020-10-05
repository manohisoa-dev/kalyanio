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
        <strong>Détail</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Détail Fournisseur : {{$fournisseur->nom}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$fournisseur->id}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Nom</h4>
                        <h5>{{$fournisseur->nom}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Apropos</h4>
                        <h5>{{$fournisseur->apropos}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Tel</h4>
                        <h5>{{$fournisseur->tel}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Mail</h4>
                        <h5>{{$fournisseur->mail}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Adresse</h4>
                        <h5>{{$fournisseur->adresse}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Ville</h4>
                        <h5>{{$fournisseur->ville}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Siteweb</h4>
                        <h5>{{$fournisseur->siteweb}}</h5>
                    </li>
                    <li class="list-group-item">
                        <h4>Facebook</h4>
                        <h5>{{$fournisseur->facebook}}</h5>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

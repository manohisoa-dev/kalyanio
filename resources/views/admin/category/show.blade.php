@extends('admin.layouts.app')

@section('page-heading')
<h2>Categories</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Categories</a>
    </li>
    <li>
        <a href="{{ route('admin.category.index') }}">Listes</a>
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
                <h5>Détail Category : {{$category->libelle}}</h5>
            </div>
            <div class="ibox-content">
                <ul class="list-group">
                                        <li class="list-group-item">
                        <h4>Id</h4>
                        <h5>{{$category->id}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Libelle</h4>
                        <h5>{{$category->libelle}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Desription</h4>
                        <h5>{{$category->desription}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Créer le</h4>
                        <h5>{{$category->created_at->diffForHumans()}}</h5>
                    </li>
                                        <li class="list-group-item">
                        <h4>Mise à jour le</h4>
                        <h5>{{$category->updated_at->diffForHumans()}}</h5>
                    </li>
                                    </ul>
            </div>
        </div>
    </div>
</div>

@endsection

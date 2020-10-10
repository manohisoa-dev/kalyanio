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
        <strong>Ajout</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Ajouter un nouveau Planning</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.planning.store') }}" method="post">

                    {{ csrf_field() }}
                                                        
                    <div class="form-group">
                        <label for="nourriture_id">Nourriture</label>
                        <select class="form-control{{ $errors->has('nourriture_id') ? ' is-invalid' : '' }} chosen-select" id="nourriture_id" name="nourriture_id" required>
                            @foreach(\App\Nourriture::orderBy('libelle')->get() as $item)
                                <option value="{{$item->id}}">
                                    {{$item->libelle . ' (' . $item->cout() . ' | '. $item->coutFmg() .')'}}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->has('nourriture_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nourriture_id') }}</strong>
                            </span>
                        @endif
                    </div>
                                            
                    {!! \Nvd\Crud\Form::input('date','date')->show() !!}

                    <div class="form-group">
                        <label for="heure">Heure</label>
                        <input type="time" class="form-control" id="heure" name="heure">
                    </div>
                                            
                    {!! \Nvd\Crud\Form::select( 'plannifier_pour', [ 'matin', 'midi', 'soir' ] )->show() !!}
                                                                                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

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
        <strong>Edition</strong>
    </li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Mise à jour Planning : {{$planning->nourriture_id}}</h5>
            </div>
            <div class="ibox-content">
                <form action="{{ route('admin.planning.index')}}/{{$planning->id}}" method="post">

                    {{ csrf_field() }}

                    {{ method_field("PUT") }}

                    <div class="form-group">
                        <label for="nourriture_id">Nourriture</label>
                        <select class="form-control{{ $errors->has('nourriture_id') ? ' is-invalid' : '' }} chosen-select" id="nourriture_id" name="nourriture_id" required>
                            @foreach(\App\Nourriture::orderBy('libelle')->get() as $item)
                                <option value="{{$item->id}}" {{$planning->nourriture_id == $item->id ? 'selected' : '' }}>
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
                                                                        
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" name="date" value="{{$planning->getDate()}}">

                        @if ($errors->has('date'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="heure">Heure</label>
                        <input type="time" class="form-control" id="heure" name="heure" value="{{$planning->getHeure()}}">

                        @if ($errors->has('heure'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('heure') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="plannifier_pour">Plannifier pour</label>

                        <select class="form-control{{ $errors->has('plannifier_pour') ? ' is-invalid' : '' }} chosen-select" id="plannifier_pour" name="plannifier_pour" required>
                            <option value="matin" {{$planning->plannifier_pour == 'matin' ? 'selected' : ''}}>Matin</option>
                            <option value="midi" {{$planning->plannifier_pour == 'midi' ? 'selected' : ''}}>Midi</option>
                            <option value="soir" {{$planning->plannifier_pour == 'soir' ? 'selected' : ''}}>Soir</option>
                        </select>

                        @if ($errors->has('plannifier_pour'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('plannifier_pour') }}</strong>
                            </span>
                        @endif
                    </div>
                                                                                                                                                
                    <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="fa fa-save"></i> Enregistrer</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

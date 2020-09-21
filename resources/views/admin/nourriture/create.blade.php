@extends('admin.layouts.app')

@section('page-heading')
<h2>Nourritures</h2>
<ol class="breadcrumb">
    <li>
        <a href="#">Nourritures</a>
    </li>
    <li>
        <a href="{{ route('admin.nourriture.index') }}">Listes</a>
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
                <h5>Ajouter un nouveau Nourriture</h5>
            </div>
            <div class="ibox-content">
                <form class="form-validation form-padding" action="{{ route('admin.nourriture.store') }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}

                    <div class="row">
                        <div class="col-lg-8">
                            {!! \Nvd\Crud\Form::input('libelle','text')->show() !!}

                            <div class="form-group">
                                <label for="category_id">Catégorie</label>
                                <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }} chosen-select" id="category_id" name="category_id" required>
                                    @foreach(\App\Category::all() as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="category_id">Sous catégorie</label>
                                <select class="form-control{{ $errors->has('sous_category_id') ? ' is-invalid' : '' }} chosen-select" id="sous_category_id" name="sous_category_id" required>
                                    @foreach(\App\SousCategory::all() as $item)
                                        <option value="{{$item->id}}">{{$item->libelle}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('sous_category_id'))
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('sous_category_id') }}</strong>
                            </span>
                                @endif
                            </div>

                            {!! \Nvd\Crud\Form::input( 'nb_personne' )->show() !!}

                            {!! \Nvd\Crud\Form::textarea( 'description' )->show() !!}

                            {!! \Nvd\Crud\Form::textarea( 'preparation' )->show() !!}
                        </div>

                        <div class="col-lg-4">
                            {!! \Nvd\Crud\Form::input( 'preparation_duree' )->show() !!}

                            {!! \Nvd\Crud\Form::input( 'cuisson' )->show() !!}

                            <div class="form-group">
                                <label>Photo de l'ingrédient</label>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="customFile"></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <img id="apercu" src="http://via.placeholder.com/200" class="img-thumbnail mt-2"  width="200" height="200"/>
                                    </div>
                                </div>

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Créer</button>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        CKEDITOR.replace( 'description' );
        CKEDITOR.replace( 'preparation' );

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#apercu').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#image").change(function() {
            readURL(this);
        });
    </script>
@endsection

@extends('admin.layouts.app')

@section('page-heading')
<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
    <h2>Nourritures</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.nourriture.index') }}">Nourritures</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="title-action">
        <a href="{{ route('admin.nourriture.create') }}" type="button" class="btn btn-primary btn-block">
            <i class="fa fa-plus"></i> Ajouter un nouveau Nourriture        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Nourritures</h5>
			</div>
			<div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped grid-view-tbl">
                        <thead>
                        <tr class="header-row">
                            {!!\Nvd\Crud\Html::sortableTh('id','admin.nourriture.index','Id', '5')!!}
                            {!!\Nvd\Crud\Html::sortableTh('libelle','admin.nourriture.index','Libelle')!!}
                            {!!\Nvd\Crud\Html::sortableTh('cout','admin.nourriture.index','Coût')!!}
                            {!!\Nvd\Crud\Html::sortableTh('category_id','admin.nourriture.index','Catégorie')!!}
                            {!!\Nvd\Crud\Html::sortableTh('sous_category_id','admin.nourriture.index','Sous catégorie')!!}
                            {!!\Nvd\Crud\Html::sortableTh('description','admin.nourriture.index','Description')!!}
                            {!!\Nvd\Crud\Html::sortableTh('preparation','admin.nourriture.index','Préparation')!!}
                            {!!\Nvd\Crud\Html::sortableTh('preparation_duree','admin.nourriture.index','Prépa Durée')!!}
                            {!!\Nvd\Crud\Html::sortableTh('cuisson','admin.nourriture.index','Cuisson')!!}
                            <th width="10%"></th>
                        </tr>
                        <tr class="search-row">
                            <form class="search-form">
                                <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                <td><input type="text" class="form-control" name="libelle" value="{{Request::input("libelle")}}"></td>
                                <td><input type="text" class="form-control" name="cout" value="{{Request::input("cout")}}"></td>
                                <td>
                                    <select class="form-control chosen-select" id="category_id" name="category_id">
                                        <option value="">Toutes</option>
                                        @foreach(\App\Category::all() as $item)
                                            <option value="{{$item->id}}" {{Request::input("category_id") == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control chosen-select" id="sous_category_id" name="sous_category_id">
                                        <option value="">Toutes</option>
                                        @foreach(\App\SousCategory::all() as $item)
                                            <option value="{{$item->id}}" {{Request::input("sous_category_id") == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="description" value="{{Request::input("description")}}"></td>
                                <td><input type="text" class="form-control" name="preparation" value="{{Request::input("preparation")}}"></td>
                                <td><input type="text" class="form-control" name="preparation_duree" value="{{Request::input("preparation_duree")}}"></td>
                                <td><input type="text" class="form-control" name="cuisson" value="{{Request::input("cuisson")}}"></td>
                                <td style="min-width: 6em;">@include('vendor.crud.single-page-templates.common.search-btn')</td>
                            </form>
                        </tr>
                        </thead>

                        <tbody>
                        @forelse ( $records as $record )
                            <tr>
                                <td>
                                    {{ $record->id }}
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="text"
                                          data-name="libelle"
                                          data-value="{{ $record->libelle }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.nourriture.index')}}/{{ $record->{$record->getKeyName()} }}"
                                    >{{ $record->libelle }}</span>
                                </td>
                                <td>
                                    {{ $record->cout() }} <br><small><i>{{$record->coutFmg()}}</i></small>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="number"
                                          data-name="category_id"
                                          data-value="{{ $record->category_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.nourriture.index')}}/{{ $record->{$record->getKeyName()} }}"
                                    >{{ $record->category ? $record->category->libelle : '' }}</span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="number"
                                          data-name="sous_category_id"
                                          data-value="{{ $record->sous_category_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.nourriture.index')}}/{{ $record->{$record->getKeyName()} }}"
                                    >{{ $record->sousCategory ? $record->sousCategory->libelle : '' }}</span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="textarea"
                                          data-name="description"
                                          data-value="{{ $record->description }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.nourriture.index')}}/{{ $record->{$record->getKeyName()} }}"
                                    >{!! str_limit($record->description, 50, '...') !!}</span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="textarea"
                                          data-name="description"
                                          data-value="{{ $record->preparation }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.nourriture.index')}}/{{ $record->{$record->getKeyName()} }}"
                                    >{!! str_limit($record->preparation, 50, '...') !!}</span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="textarea"
                                          data-name="description"
                                          data-value="{{ $record->preparation_duree }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.nourriture.index')}}/{{ $record->{$record->getKeyName()} }}"
                                    >{{ $record->preparation_duree }}</span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="textarea"
                                          data-name="description"
                                          data-value="{{ $record->cuisson }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.nourriture.index')}}/{{ $record->{$record->getKeyName()} }}"
                                    >{{ $record->cuisson }}</span>
                                </td>
                                <td class="actions-cell text-center" width="7%">
                                    <form class="form-inline" action="{{route('admin.nourriture.index')}}/{{$record->id}}" method="POST">
                                        <a href="{{route('admin.nourriture-ingredient.index')}}?nourriture_id={{$record->id}}" alt="Ajouter des ingrédients">
                                            <i class="fa fa-gears" alt="Ajouter des ingrédients"></i>
                                        </a>&nbsp;&nbsp;

                                        <a href="{{route('admin.nourriture.index')}}/{{$record->id}}" alt="Détail"><i class="fa fa-eye" alt="Détail"></i></a>&nbsp;&nbsp;

                                        <a href="{{route('admin.nourriture.index')}}/{{$record->id}}/edit" alt="Modifier"><i class="fa fa-pencil-square-o" alt="Modifier"></i></a>

                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button style="outline: none;background: transparent;border: none;"
                                                onclick="return confirm('Vous êtes sur?')"
                                                type="submit" class="fa fa-trash text-danger" alt="Supprimer"></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 8])
                        @endforelse
                        </tbody>

                    </table>
                </div>


                @include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

				<script>
					$(".editable").editable({ajaxOptions:{method:'PUT'}});
				</script>
			</div>
		</div>
	</div>
</div>
@endsection

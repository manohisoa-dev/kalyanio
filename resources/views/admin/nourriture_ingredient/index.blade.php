@extends('admin.layouts.app')

@section('page-heading')
<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
    <h2>Nourriture Ingredients</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.nourriture-ingredient.index') }}">Nourriture Ingredients</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="title-action">
        <a href="{{ route('admin.nourriture-ingredient.create') . (Request::input("nourriture_id") != '' ? '?nourriture_id='.Request::input("nourriture_id") : '')}}" type="button" class="btn btn-primary btn-block">
            <i class="fa fa-plus"></i> Ajouter un nouveau Nourriture Ingredient
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Nourriture Ingredients</h5>
			</div>
			<div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped grid-view-tbl">
                    <thead>
                        <tr class="header-row">
                            {!!\Nvd\Crud\Html::sortableTh('id','admin.nourriture-ingredient.index','Id')!!}
                            {!!\Nvd\Crud\Html::sortableTh('nourriture_id','admin.nourriture-ingredient.index','Nourriture')!!}
                            {!!\Nvd\Crud\Html::sortableTh('ingredient_id','admin.nourriture-ingredient.index','Ingredient')!!}
                            {!!\Nvd\Crud\Html::sortableTh('poids','admin.nourriture-ingredient.index','Poids')!!}
                            {!!\Nvd\Crud\Html::sortableTh('created_at','admin.nourriture-ingredient.index','Créer le')!!}
                            {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.nourriture-ingredient.index','Mise à jour le')!!}
                            <th></th>
                        </tr>
                        <tr class="search-row">
                            <form class="search-form">
                                <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                <td>
                                    <select class="form-control chosen-select" id="nourriture_id" name="nourriture_id">
                                        <option value="">Toutes</option>
                                        @foreach(\App\Nourriture::orderBy('libelle')->get() as $item)
                                            <option value="{{$item->id}}" {{Request::input("nourriture_id") == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control chosen-select" id="ingredient_id" name="ingredient_id">
                                        <option value="">Tous</option>
                                        @foreach(\App\Ingredient::orderBy('libelle')->get() as $item)
                                            <option value="{{$item->id}}" {{Request::input("ingredient_id") == $item->id ? 'selected' : '' }}>{{$item->libelle}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="poids" value="{{Request::input("poids")}}"></td>
                                <td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
                                <td><input type="text" class="form-control" name="updated_at" value="{{Request::input("updated_at")}}"></td>
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
                                              data-type="number"
                                              data-name="nourriture_id"
                                              data-value="{{ $record->nourriture_id }}"
                                              data-pk="{{ $record->{$record->getKeyName()} }}"
                                              data-url="{{ route('admin.nourriture-ingredient.index')}}/{{ $record->{$record->getKeyName()} }}"
                                              >{{ $record->nourriture ? $record->nourriture->libelle : '' }}</span>
                                                                        </td>
                                                                    <td>
                                                                            <span class="editable"
                                              data-type="number"
                                              data-name="ingredient_id"
                                              data-value="{{ $record->ingredient_id }}"
                                              data-pk="{{ $record->{$record->getKeyName()} }}"
                                              data-url="{{ route('admin.nourriture-ingredient.index')}}/{{ $record->{$record->getKeyName()} }}"
                                              >{{ $record->ingredient ? $record->ingredient->libelle : '' }}</span>
                                                                        </td>
                                                                    <td>
                                                                            <span class="editable"
                                              data-type="text"
                                              data-name="poids"
                                              data-value="{{ $record->poids }}"
                                              data-pk="{{ $record->{$record->getKeyName()} }}"
                                              data-url="{{ route('admin.nourriture-ingredient.index')}}/{{ $record->{$record->getKeyName()} }}"
                                              >{{ $record->poids }}</span>
                                                                        </td>
                                                                    <td>
                                                                                {{ $record->created_at->diffForHumans() }}
                                                                        </td>
                                                                    <td>
                                                                                {{ $record->updated_at->diffForHumans() }}
                                                                        </td>
                                                                    @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.nourriture-ingredient.index'), 'record' => $record ] )
                                </tr>
                            @empty
                                @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 7])
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

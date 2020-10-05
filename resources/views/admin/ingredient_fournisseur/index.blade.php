@extends('admin.layouts.app')

@section('page-heading')
<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
    <h2>Ingredient Fournisseurs</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.ingredient-fournisseur.index') }}">Ingredient Fournisseurs</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="title-action">
        <a href="{{ route('admin.ingredient-fournisseur.create') }}" type="button" class="btn btn-primary btn-block">
            <i class="fa fa-plus"></i> Ajouter un nouveau Ingredient Fournisseur        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Ingredient Fournisseurs</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                        {!!\Nvd\Crud\Html::sortableTh('id','admin.ingredient-fournisseur.index','Id')!!}
                        {!!\Nvd\Crud\Html::sortableTh('ingredient_id','admin.ingredient-fournisseur.index','Ingredient')!!}
                        {!!\Nvd\Crud\Html::sortableTh('fournisseur_id','admin.ingredient-fournisseur.index','Fournisseur')!!}
                        <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                            <td><input type="text" class="form-control" name="ingredient_id" value="{{Request::input("ingredient_id")}}"></td>
                            <td><input type="text" class="form-control" name="fournisseur_id" value="{{Request::input("fournisseur_id")}}"></td>
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
                                          data-name="ingredient_id"
                                          data-value="{{ $record->ingredient_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.ingredient-fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->ingredient->libelle }}</span>
                                </td>
                                <td>
                                    <span class="editable"
                                          data-type="number"
                                          data-name="fournisseur_id"
                                          data-value="{{ $record->fournisseur_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.ingredient-fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->fournisseur->nom }}</span>
                                    </td>
                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.ingredient-fournisseur.index'), 'record' => $record ] )
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 6])
                        @endforelse
                    </tbody>

                </table>

                @include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

				<script>
					$(".editable").editable({ajaxOptions:{method:'PUT'}});
				</script>
			</div>
		</div>
	</div>
</div>
@endsection

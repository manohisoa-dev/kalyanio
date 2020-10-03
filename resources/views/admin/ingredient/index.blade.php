@extends('admin.layouts.app')

@section('page-heading')
<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
    <h2>Ingredients</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.ingredient.index') }}">Ingredients</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="title-action">
        <a href="{{ route('admin.ingredient.create') }}" type="button" class="btn btn-primary btn-block">
            Ajouter un nouveau Ingredient        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Ingredients</h5>
			</div>
			<div class="ibox-content">
                <div class="table-responsive">
                    <table class="table table-striped grid-view-tbl">
                    <thead>
                        <tr class="header-row">
                            {!!\Nvd\Crud\Html::sortableTh('id','admin.ingredient.index','Id')!!}
                            {!!\Nvd\Crud\Html::sortableTh('libelle','admin.ingredient.index','Libelle')!!}
                            {!!\Nvd\Crud\Html::sortableTh('prix','admin.ingredient.index','Prix')!!}
                            {!!\Nvd\Crud\Html::sortableTh('created_at','admin.ingredient.index','Créer le')!!}
                            {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.ingredient.index','Mise à jour le')!!}
                            <th></th>
                        </tr>
                        <tr class="search-row">
                            <form class="search-form">
                                <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                <td><input type="text" class="form-control" name="libelle" value="{{Request::input("libelle")}}"></td>
                                <td><input type="text" class="form-control" name="prix" value="{{Request::input("prix")}}"></td>
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
                                              data-type="text"
                                              data-name="libelle"
                                              data-value="{{ $record->libelle }}"
                                              data-pk="{{ $record->{$record->getKeyName()} }}"
                                              data-url="{{ route('admin.ingredient.index')}}/{{ $record->{$record->getKeyName()} }}"
                                              >{{ $record->libelle }}</span>
                                    </td>
                                    <td>
                                        <span class="editable"
                                              data-type="text"
                                              data-name="prix"
                                              data-value="{{ $record->prix }}"
                                              data-pk="{{ $record->{$record->getKeyName()} }}"
                                              data-url="{{ route('admin.ingredient.index')}}/{{ $record->{$record->getKeyName()} }}"
                                              >
                                            {{ $record->prix() }} <br><small><i>{{$record->prixFmg()}}</i></small>
                                        </span>
                                    </td>
                                    <td>
                                        {{ $record->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        {{ $record->updated_at->diffForHumans() }}
                                    </td>
                                    @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.ingredient.index'), 'record' => $record ] )
                                </tr>
                            @empty
                                @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 6])
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

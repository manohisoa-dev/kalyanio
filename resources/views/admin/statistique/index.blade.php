@extends('admin.layouts.app')

@section('page-heading')
<div class="col-sm-4">
    <h2>Statistiques</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.statistique.index') }}">Statistiques</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.statistique.create') }}" type="button" class="btn btn-primary">
            <i class="fa fa-plus"></i> Ajouter un nouveau Statistique        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Statistiques</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                                                    {!!\Nvd\Crud\Html::sortableTh('id','admin.statistique.index','Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('user_id','admin.statistique.index','User Id')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('nourriture_id','admin.statistique.index','Nourriture')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('created_at','admin.statistique.index','Créer le')!!}
                                                    {!!\Nvd\Crud\Html::sortableTh('updated_at','admin.statistique.index','Mise à jour le')!!}
                                            <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                                                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                                                            <td><input type="text" class="form-control" name="user_id" value="{{Request::input("user_id")}}"></td>
                                                            <td><input type="text" class="form-control" name="nourriture_id" value="{{Request::input("nourriture_id")}}"></td>
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
                                          data-name="user_id"
                                          data-value="{{ $record->user_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.statistique.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->user_id }}</span>
                                                                    </td>
                                                                <td>
                                                                        <span class="editable"
                                          data-type="number"
                                          data-name="nourriture_id"
                                          data-value="{{ $record->nourriture_id }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.statistique.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->nourriture_id }}</span>
                                                                    </td>
                                                                <td>
                                                                            {{ $record->created_at->diffForHumans() }}
                                                                    </td>
                                                                <td>
                                                                            {{ $record->updated_at->diffForHumans() }}
                                                                    </td>
                                                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.statistique.index'), 'record' => $record ] )
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

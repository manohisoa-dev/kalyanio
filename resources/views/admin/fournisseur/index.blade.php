@extends('admin.layouts.app')

@section('page-heading')
<div class="col-lg-9 col-md-8 col-sm-8 col-xs-12">
    <h2>Fournisseurs</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.fournisseur.index') }}">Fournisseurs</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="title-action">
        <a href="{{ route('admin.fournisseur.create') }}" type="button" class="btn btn-primary btn-block">
            <i class="fa fa-plus"></i> Ajouter un nouveau Fournisseur        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5>Fournisseurs</h5>
			</div>
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                        {!!\Nvd\Crud\Html::sortableTh('id','admin.fournisseur.index','Id')!!}
                        {!!\Nvd\Crud\Html::sortableTh('nom','admin.fournisseur.index','Nom')!!}
                        {!!\Nvd\Crud\Html::sortableTh('apropos','admin.fournisseur.index','Apropos')!!}
                        {!!\Nvd\Crud\Html::sortableTh('tel','admin.fournisseur.index','Tel')!!}
                        {!!\Nvd\Crud\Html::sortableTh('mail','admin.fournisseur.index','Mail')!!}
                        {!!\Nvd\Crud\Html::sortableTh('adresse','admin.fournisseur.index','Adresse')!!}
                        {!!\Nvd\Crud\Html::sortableTh('ville','admin.fournisseur.index','Ville')!!}
                        {!!\Nvd\Crud\Html::sortableTh('siteweb','admin.fournisseur.index','Siteweb')!!}
                        {!!\Nvd\Crud\Html::sortableTh('facebook','admin.fournisseur.index','Facebook')!!}
                        <th></th>
                    </tr>
                    <tr class="search-row">
                        <form class="search-form">
                            <td><input type="text" class="form-control" name="id" value="{{Request::input("id")}}"></td>
                            <td><input type="text" class="form-control" name="nom" value="{{Request::input("nom")}}"></td>
                            <td><input type="text" class="form-control" name="apropos" value="{{Request::input("apropos")}}"></td>
                            <td><input type="text" class="form-control" name="tel" value="{{Request::input("tel")}}"></td>
                            <td><input type="text" class="form-control" name="mail" value="{{Request::input("mail")}}"></td>
                            <td><input type="text" class="form-control" name="adresse" value="{{Request::input("adresse")}}"></td>
                            <td><input type="text" class="form-control" name="ville" value="{{Request::input("ville")}}"></td>
                            <td><input type="text" class="form-control" name="siteweb" value="{{Request::input("siteweb")}}"></td>
                            <td><input type="text" class="form-control" name="facebook" value="{{Request::input("facebook")}}"></td>
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
                                          data-name="nom"
                                          data-value="{{ $record->nom }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->nom }}</span>
                                    </td>
                                <td>
                                        <span class="editable"
                                          data-type="textarea"
                                          data-name="apropos"
                                          data-value="{{ $record->apropos }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->apropos }}</span>
                                    </td>
                                <td>
                                        <span class="editable"
                                          data-type="text"
                                          data-name="tel"
                                          data-value="{{ $record->tel }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->tel }}</span>
                                    </td>
                                <td>
                                        <span class="editable"
                                          data-type="text"
                                          data-name="mail"
                                          data-value="{{ $record->mail }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->mail }}</span>
                                    </td>
                                <td>
                                        <span class="editable"
                                          data-type="text"
                                          data-name="adresse"
                                          data-value="{{ $record->adresse }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->adresse }}</span>
                                    </td>
                                <td>
                                        <span class="editable"
                                          data-type="text"
                                          data-name="ville"
                                          data-value="{{ $record->ville }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->ville }}</span>
                                    </td>
                                <td>
                                        <span class="editable"
                                          data-type="text"
                                          data-name="siteweb"
                                          data-value="{{ $record->siteweb }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->siteweb }}</span>
                                    </td>
                                <td>
                                        <span class="editable"
                                          data-type="text"
                                          data-name="facebook"
                                          data-value="{{ $record->facebook }}"
                                          data-pk="{{ $record->{$record->getKeyName()} }}"
                                          data-url="{{ route('admin.fournisseur.index')}}/{{ $record->{$record->getKeyName()} }}"
                                          >{{ $record->facebook }}</span>
                                </td>
                                @include( 'vendor.crud.single-page-templates.common.actions', [ 'url' => route('admin.fournisseur.index'), 'record' => $record ] )
                            </tr>
                        @empty
                            @include ('vendor.crud.single-page-templates.common.not-found-tr',['colspan' => 12])
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

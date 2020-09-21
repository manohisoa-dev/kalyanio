@extends('admin.layouts.app')

@section('css')
<link href="{{ asset('admin/css/plugins/iCheck/custom.css') }}" rel="stylesheet">

<link href="{{ asset('admin/css/plugins/fullcalendar/fullcalendar.css') }}" rel="stylesheet">
<link href="{{ asset('admin/css/plugins/fullcalendar/fullcalendar.print.css') }}" rel='stylesheet' media='print'>
@endsection

@section('page-heading')
<div class="col-sm-4">
    <h2>Plannings</h2>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.planning.index') }}">Plannings</a>
        </li>
        <li class="active">
            <strong>Listes</strong>
        </li>
    </ol>
</div>
<div class="col-sm-8">
    <div class="title-action">
        <a href="{{ route('admin.planning.create') }}" type="button" class="btn btn-primary">
            <i class="fa fa-plus"></i> Ajouter un nouveau Planning        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<div class="ibox float-e-margins">
			<div class="ibox-content">
                <table class="table table-striped grid-view-tbl">
                <thead>
                    <tr class="header-row">
                        {!!\Nvd\Crud\Html::sortableTh('id','admin.planning.index','Id')!!}
                        {!!\Nvd\Crud\Html::sortableTh('nourriture_id','admin.planning.index','Nourriture')!!}
                        {!!\Nvd\Crud\Html::sortableTh('date','admin.planning.index','Date')!!}
                        {!!\Nvd\Crud\Html::sortableTh('plannifier_pour','admin.planning.index','Plannifier Pour')!!}
                        {!!\Nvd\Crud\Html::sortableTh('created_at','admin.planning.index','Créer le')!!}
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
                            <td><input type="date" class="form-control" name="date" value="{{Request::input("date")}}"></td>
                            <td>{!!\Nvd\Crud\Html::selectRequested(
                                    'plannifier_pour',
                                    [ '', 'matin', 'midi', 'soir' ],
                                    ['class'=>'form-control']
                                )!!}</td>
                            <td><input type="text" class="form-control" name="created_at" value="{{Request::input("created_at")}}"></td>
                            <td style="min-width: 6em;">@include('vendor.crud.single-page-templates.common.search-btn')</td>
                        </form>
                    </tr>
                    </thead>
                </table>

                @include('vendor.crud.single-page-templates.common.pagination', [ 'records' => $records ] )

			</div>
		</div>
	</div>
</div>

<div class="row animated fadeInDown">
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Déplacement des nourritures</h5>
            </div>
            <div class="ibox-content">
                <div id='external-events'>
                    <p>Déplacer les nourritures sur le callendrier.</p>
                    @foreach(\App\Nourriture::paginate(5) as $nourriture)
                        <div class='external-event navy-bg'>{{$nourriture->libelle}}</div>
                    @endforeach
                    <p class="m-t">
                        <input type='checkbox' id='drop-remove' class="i-checks" checked /> <label for='drop-remove'>supprimer après le déplacement</label>
                    </p>
                </div>
            </div>
        </div>
        <div class="ibox float-e-margins">
            <div class="ibox-content">
                <h2>FullCalendar</h2> is a jQuery plugin that provides a full-sized, drag & drop calendar like the one below. It uses AJAX to fetch events on-the-fly for each month and is
                easily configured to use your own feed format (an extension is provided for Google Calendar).
                <p>
                    <a href="http://arshaw.com/fullcalendar/" target="_blank">FullCalendar documentation</a>
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Vos plannings</h5>
            </div>
            <div class="ibox-content">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<!-- jQuery UI  -->
<script src="{{ asset('admin/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>

<!-- iCheck -->
<script src="{{ asset('admin/js/plugins/iCheck/icheck.min.js') }}"></script>

<!-- Full Calendar -->
<script src="{{ asset('admin/js/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/fullcalendar/fr.js') }}"></script>

<script>
    $(document).ready(function() {

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        /* initialize the external events
         -----------------------------------------------------------------*/


        $('#external-events div.external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1111999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });
    });
</script>
<script>
        /* initialize the calendar
         -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            locale: 'fr',
            timeFormat: 'H(:mm)',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            events: {!! $planningJson !!}
        });




</script>
@endsection

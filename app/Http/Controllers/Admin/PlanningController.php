<?php
namespace App\Http\Controllers\admin;

use App\Nourriture;
use App\Planning;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class PlanningController extends Controller
{
    public $viewDir = "admin.planning";

    public function index()
    {
        $records = Planning::findRequested();

        $events = [];
        foreach ($records as $item) {
            $events[] = [
                'title' => $item->nourriture->libelle,
                'url'   => route('admin.planning.edit' , array('planning' => $item->id)),
                'start' => $item->date
            ];
        }
        $planningJson = json_encode($events);

        return $this->view( "index", compact('records','planningJson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $this->validate($request, Planning::validationRules());

        $planning = Planning::create($request->except('heure'));

        $nourriture = Nourriture::find($request->input('nourriture_id')) ;
        $nourriture->cout = $nourriture->cout($format = false) ;
        $nourriture->save() ;

        if($request->input('heure') != ''){
            $planning->date = $planning->date . ' ' . $request->input('heure') . ':00';
            $planning->save() ;
        }

        # notification
        Notify::success('Planning a été créer avec succès');
        return redirect(route('admin.planning.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Planning $planning)
    {
        return $this->view("show",['planning' => $planning]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Planning $planning)
    {
        return $this->view( "edit", ['planning' => $planning] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Planning $planning)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Planning::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $planning->update($data);
            return "Record updated";
        }

        $this->validate($request, Planning::validationRules());

        $planning->update($request->except('heure'));

        $nourriture = Nourriture::find($request->input('nourriture_id')) ;
        $nourriture->cout = $nourriture->cout($format = false) ;
        $nourriture->save() ;

        if($request->input('heure') != ''){
            $planning->date = $planning->date . ' ' . $request->input('heure');
            $planning->save() ;
        }

        # notification
        Notify::success('Planning a été mise à jour avec succès');
        return redirect(route('admin.planning.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Planning $planning)
    {
        $planning->delete();

        # notification
        Notify::success('Planning a été supprimer avec succès');
        return redirect(route('admin.planning.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}

<?php
namespace App\Http\Controllers\admin;

use App\Statistique;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class StatistiqueController extends Controller
{
    public $viewDir = "admin.statistique";

    public function index()
    {
        $records = Statistique::findRequested();
        return $this->view( "index", ['records' => $records] );
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
        $this->validate($request, Statistique::validationRules());

        Statistique::create($request->all());

        # notification
        Notify::success('Statistique a été créer avec succès');
        return redirect(route('admin.statistique.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Statistique $statistique)
    {
        return $this->view("show",['statistique' => $statistique]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Statistique $statistique)
    {
        return $this->view( "edit", ['statistique' => $statistique] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Statistique $statistique)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Statistique::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $statistique->update($data);
            return "Record updated";
        }

        $this->validate($request, Statistique::validationRules());

        $statistique->update($request->all());

        # notification
        Notify::success('Statistique a été mise à jour avec succès');
        return redirect(route('admin.statistique.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Statistique $statistique)
    {
        $statistique->delete();

        # notification
        Notify::success('Statistique a été supprimer avec succès');
        return redirect(route('admin.statistique.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}

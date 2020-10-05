<?php
namespace App\Http\Controllers\admin;

use App\Fournisseur;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

class FournisseurController extends Controller
{
    public $viewDir = "admin.fournisseur";

    public function index()
    {
        $records = Fournisseur::findRequested();
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
        $this->validate($request, Fournisseur::validationRules());

        Fournisseur::create($request->all());

        # notification
        Notify::success('Fournisseur a été créer avec succès');
        return redirect(route('admin.fournisseur.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Fournisseur $fournisseur)
    {
        return $this->view("show",['fournisseur' => $fournisseur]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Fournisseur $fournisseur)
    {
        return $this->view( "edit", ['fournisseur' => $fournisseur] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Fournisseur $fournisseur)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Fournisseur::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $fournisseur->update($data);
            return "Record updated";
        }

        $this->validate($request, Fournisseur::validationRules());

        $fournisseur->update($request->all());

        # notification
        Notify::success('Fournisseur a été mise à jour avec succès');
        return redirect(route('admin.fournisseur.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fournisseur $fournisseur)
    {
        $fournisseur->delete();

        # notification
        Notify::success('Fournisseur a été supprimer avec succès');
        return redirect(route('admin.fournisseur.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}

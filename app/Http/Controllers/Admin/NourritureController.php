<?php
namespace App\Http\Controllers\admin;

use App\Nourriture;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Jleon\LaravelPnotify\Notify;

use MediaUploader;
use Plank\Mediable\Media;

class NourritureController extends Controller
{
    public $viewDir = "admin.nourriture";

    public function index()
    {
//        Nourriture::regenerateAllAvatar() ;
        $records = Nourriture::findRequested();
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
        $this->validate($request, Nourriture::validationRules());

        $nourriture = Nourriture::create($request->except('image'));

        #ajout photo pour l'evenement
        if ($request->file('image')) {
            $media = MediaUploader::fromSource($request->file('image'))->toDestination('uploads', '/nourriture')->useHashForFilename()->upload();
            $nourriture->attachMedia($media, 'image');

            Nourriture::regenerateMyAvatar($media) ;
        }

        # notification
        Notify::success('Nourriture a été créer avec succès');
        return redirect(route('admin.nourriture.index'));
    }

    /**
     * Display the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function show(Request $request, Nourriture $nourriture)
    {
        return $this->view("show",['nourriture' => $nourriture]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function edit(Request $request, Nourriture $nourriture)
    {
        return $this->view( "edit", ['nourriture' => $nourriture] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function update(Request $request, Nourriture $nourriture)
    {
        if( $request->isXmlHttpRequest() )
        {
            $data = [$request->name  => $request->value];
            $validator = \Validator::make( $data, Nourriture::validationRules( $request->name ) );
            if($validator->fails())
                return response($validator->errors()->first( $request->name),403);
            $nourriture->update($data);
            return "Record updated";
        }

        $this->validate($request, Nourriture::validationRules());

        $nourriture->update($request->except('image'));

        #ajout photo pour l'evenement
        if ($request->file('image')) {
            $media = MediaUploader::fromSource($request->file('image'))->toDestination('uploads', '/nourriture')->useHashForFilename()->upload();
            $nourriture->attachMedia($media, 'image');

            Nourriture::regenerateMyAvatar($media) ;
        }

        # notification
        Notify::success('Nourriture a été mise à jour avec succès');
        return redirect(route('admin.nourriture.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return  \Illuminate\Http\Response
     */
    public function destroy(Request $request, Nourriture $nourriture)
    {
        $nourriture->delete();

        # notification
        Notify::success('Nourriture a été supprimer avec succès');
        return redirect(route('admin.nourriture.index'));
    }

    protected function view($view, $data = [])
    {
        return view($this->viewDir.".".$view, $data);
    }

}
